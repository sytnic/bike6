<?php include_once('thislevel.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php     $title = "Personal Home Page";
          $description = "";
          include($level.LAYOUT.'head.php'); 
?>    
    <link rel="stylesheet" href="/css/jquery.dataTables.css">
<!-- 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>  
-->
   
</head>

<body>
<?php include($level.LAYOUT.'body_page_begin.php'); ?>
    
			<h1>Tutorials</h1>
    
    <h2>HTML</h2>
    <ul>
      <li>HTML-основы</li>
      <li>HTML-продвинутый
          <ul>
              <li>Drag and Drop</li>
              <li>Green tea</li>
              <li>ghgh tea</li>
              <li>yuiuoiu tea</li>                          
          </ul>        
        </li>               
    </ul>
    
    <h2>Javascript</h2>
    <ul>
      <li>JS-основы    
             <ul>
                 <li>Black tea</li>
                 <li>Green tea</li>
                 <li>ghgh tea</li>
                 <li>yuiuoiu tea</li>                          
             </ul>        
      </li>               
    </ul>
    
    <h2>PHP</h2>
    <ul>
      <li>PHP-основы(процедурный)</li>
      <li>PHP-ООП</li>
        <li>werew
             <ul>
                 <li>Black tea </li>
                 <li>Green tea </li>
                 <li>ghgh tea  </li>
                 <li>yuiuoiu tea </li>                         
             </ul>        
        </li>               
    </ul>
    
   <h2>MVC (на PHP)</h2>
    <h3>MVC. Front Controller</h3>
    
    <ul>      
      <li >MVC-основы(до БД) </li>
      <li >MVC-основы(с БД)  </li>
      <li>werew
          <ul>
              <li >Black tea                 </li> 
              <li>Название <a href="##" class="badge btn badge-primary" data-clipboard-text="Название">copy</a> </li> 
              <li>MVC-основа с 738 <a href="##" class="badge btn badge-primary" data-clipboard-text="MVC-основа с 738">copy</a> </li>
              <li>MVC-основа с 568 <a href="##" class="badge btn badge-primary" data-clipboard-text="MVC-основа с 568">copy</a> </li>             
          </ul>        
      </li>               
    </ul>
    
    <h3>MVC. Page Controller</h3>     
   
    <br>
      <hr>
    <br>
    
<table id="table_id">
    <thead>
        <tr>            
            <th>Category</th>
			<th>Title</th>
			<th>Обновлено</th>
        </tr>
    </thead>
        
    <tbody>

<?php   $query  = "SELECT * ";
		$query .= " FROM pages ";
		$query .= " WHERE visible = 1 "; // it's mean 'public'
		$query .= " ORDER BY position ASC";
		$pages_set = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($pages_set);
		
         
		while($row = mysqli_fetch_assoc($pages_set)) {
          echo '<tr>';    
            echo '<td>';
            echo htmlentities($row['category']);
            echo '</td>'; 
            echo '<td><a href="tutorial.php?id='.$row['id'].'">';
            echo htmlentities($row['title']);
            echo '</a></td>';
            echo '<td>';
            echo substr($row['date_updated'], 0, 10 );
            echo '</td>';
          echo '</tr>';
        }
?>
    
    </tbody>
</table>  
    
    
<?php include($level.LAYOUT.'body_page_bottom.php'); 
     // include($level.LAYOUT.'incl/script_w3codecolor.php');              
?>
 <!--  Datatables -->
<script type="text/javascript" language="javascript" src="/js/jquery.dataTables.min.js"></script>
<script>
      $(document).ready( function () {
      $('#table_id').DataTable();
     } );
</script>  
    
 <!--  clipboard.js -->  
<script src="/js/clipboard.min.js"></script>  
<script>
    var clipboard = new ClipboardJS('.badge');

    clipboard.on('success', function(e) {
        console.log(e);
    });

    clipboard.on('error', function(e) {
        console.log(e);
    });
</script>
    
</body>
</html>