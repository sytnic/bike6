<?php  include_once('thislevel.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>    
<?php     $title = "txt база знаний";
          $description = "";
          include($level.LAYOUT.'head.php');
?>    
    <link rel="stylesheet" href="/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">  -->
</head>

<body>
<?php include($level.LAYOUT.'body_page_begin.php'); ?>
	
             <h1> txt база знаний </h1>
            <p>                
				Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>        
			</p>
    
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Разворачиваемая панель #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          Разворачиваемая панель #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Разворачиваемая панель #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>



    
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
		$query .= " FROM txtdb ";
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
            echo '<td><a href="txtdb.php?id='.$row['id'].'">';
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
?>    
    <!--  Datatables -->
    <script type="text/javascript" language="javascript" src="/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
      $('#table_id').DataTable();
     } );
    </script> 
    
</body>
</html>