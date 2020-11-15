<?php   include_once('thislevel.php');   
        require_once($level.'includes/validation_functions.php');

        confirm_logged_in(); 
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?php     $title = "Admin";
          $description = "";
          include($level.LAYOUT.'head.php'); 
?>       
</head>

<body>
<!-- body -->

  <!-- navbar -->
	<?php include($level.LAYOUT.'incl/nav.php'); ?>
  <!-- /navbar -->   

<!-- canvas-area -->
<div class="container-fluid">
  <div class="row" >    
    
    <!-- sidebar-l -->  
  <div class="col-md-2">    
         
  </div>  <!-- /sidebar-l /col-->

<!-- content -->      
  <div class="col-md-8">   
      <div >
        <h2>Admin Area</h2>
        <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]) ;?></p>
        <ul>
          <li><a href="admin.php">Admin page</a></li>
        </ul>
      </div>
    
    
<?php    
// Массив, предназначенный для хранения сообщений об ошибках
$add_page_errors = array();
    
    // Проверка передачи данных формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    
        // Проверка заголовка
        if (!empty($_POST['title'])) {        
            $t = mysql_prep(strip_tags($_POST['title']));
        } else {
            $add_page_errors['title'] = 'Пожалуйста, введите заголовок!';
        }	

        // Проверка категории
        if (filter_var($_POST['category'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
            $cat = $_POST['category'];
        } else { // категория не выбрана
            $add_page_errors['category'] = 'Пожалуйста, выберите категорию!';
        }	

        // Проверка описания
        if (!empty($_POST['description'])) {        
            $d = mysql_prep($_POST['description']);
        } else {
            $add_page_errors['description'] = 'Пожалуйста, введите описание!';
        }	

        // Проверка контента
        if (!empty($_POST['content'])) {
             // тег <table> может нарушить структуру страницы.
            $c = mysql_prep($_POST['content']);
        } else {
            $add_page_errors['content'] = 'Пожалуйста, введите контент!';
        }	

	if (empty($add_page_errors)) { // Если все в порядке.
		// Добавить страницу в базу данных
		$q = "INSERT INTO pages (category_id, title, description, content) VALUES ($cat, '$t', '$d', '$c')";
        // проверка, нужно удалить echo $q;
		$r = mysqli_query($connection, $q);

		if (mysqli_affected_rows($connection) === 1) { // если выполняется без сбоев (затронута ровно одна строка)
		// Вывод сообщения
			echo '<div class="alert alert-success"><h4>Страница добавлена!</h4></div>';
			// Очистка значения переменной $_POST
			$_POST = array();
			// Отправить сообщение администратору о том, что контент был добавлен?	

		} else { // Если при выполнении произошел сбой
			trigger_error('Страница не может быть добавлена из-за системной ошибки. Приносим извинения за доставленные неудобства.');
		}
	} // завершение условной конструкции $add_page_errors	

} // завершение условного выражения передачи данных главной формы

// Подключения сценария form functions, определяющего функцию create_form_input()
require($level.'includes/form_functions.php');    
    
?>
    
<h2>Добавление страницы сайта</h2>  
  
<form action="addpage_tinymce.php" method="post" accept-charset="utf-8">
    <fieldset><legend>Чтобы добавить страницу контента, заполните форму:</legend>

    <div class="form-group">
        <label for="status" class="control-label">Состояние</label>
        <select name="status" class="form-control">
        <option value="draft">Черновик</option>
        <option value="live">Рабочая версия</option>
        </select>
    </div>

<?php

    create_form_input('title', 'text', 'Название', $add_page_errors);

    // Добавление категории раскрывающегося списка
    echo '<div class="form-group';
        if (array_key_exists('category', $add_page_errors)) echo ' has-error';
        echo '">
              <label for="category" class="control-label">Категория</label>
              <select name="category" class="form-control">
              <option>Выберите категорию</option>';

        // Дополнительный материал!
        // Добавлено в главе 12
        // Допускается несколько категорий:
        // echo '"><label for="category" class="control-label">Категория</label>
        // <select name="category[]" class="form-control" multiple size="5">';

        // Выборка всех категорий и добавление в раскрывающееся меню
        $q = "SELECT id, category FROM category ORDER BY category ASC";
        $r = mysqli_query($connection, $q);
        while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
            echo "<option value=\"$row[0]\"";
            // Проверка состояния выборки:
            if (isset($_POST['category']) && ($_POST['category'] == $row[0]) ) echo ' selected="selected"';
            echo ">$row[1]</option>\n";
        }
        echo '</select>';

        if (array_key_exists('category', $add_page_errors)) echo '<span class="help-block">'. $add_page_errors['category'].'</span>';
    echo '</div>';

    create_form_input('description', 'textarea', 'Описание', $add_page_errors); 

    create_form_input('content', 'textarea', 'Контент', $add_page_errors); 
?>

       <input type="submit" name="submit_button" value="Добавить страницу" id="submit_button" class="btn btn-primary" />       

    </fieldset>
</form>
    
</div> <!-- /content /col-->

<!-- sidebar-r -->  
  <div class="col-md-2">    
    
  </div>  <!-- /sidebar-r /col-->


  </div> <!-- /canvas-area /row -->
</div> <!-- /canvas-area /container-fluid -->

<?php
  include($level.LAYOUT.'incl/footer.php');
  include($level.LAYOUT.'incl/scripts.php');  
?>
 
<!-- TinyMCE -->    
<script type="text/javascript" src="/lib/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// Общие параметры
		selector : "#content",
		// width : 1000, // этот параметр жесткий, не резиновый. 
        // если область видимости редактора заходит на другие колонки/паддинги, 
        // то нижний край для смены размера невозможно ухватить
        // также есть плохое влияние "container-fluid", лучше "container", но до конца не проверялось
		height : 400,
		// browser_spellcheck : true,  // эта штука проверяет офрографию
		
		plugins: "paste,searchreplace,fullscreen,hr,link,anchor,image,charmap,media,autoresize,autosave,contextmenu,wordcount,code",
		
		toolbar1: "cut,copy,paste,|,undo,redo,removeformat,|hr,|,link,unlink,anchor,image,|,charmap,media,|,search,replace,|,fullscreen,|,code",
		toolbar2:	"bold,italic,underline,strikethrough,|,alignleft,aligncenter,alignright,alignjustify,|,formatselect,|,bullist,numlist,|,outdent,indent,blockquote,",
        
        content_css : '/css/bootstrap.min.css,/css/w3-limited-small.css',
		 content_style: "div {margin: 10px;} h1,h2,h3,h4,h5,h6,p {padding: 10px;}"
		
		// Подключение к редактору файла css сайта, чтобы создаваемый контент выглядел в стиле сайта
		//content_css : "/examp1/css/bootstrap.min.css",
		
		});
</script>
<!-- /TinyMCE -->  


    
</body>
</html>