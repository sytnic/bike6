<?php include_once('thislevel.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
<?php     $title = "Personal Home Page";
          $description = "";
          include($level.LAYOUT.'head.php'); 
?>
</head>
    
<body>
<?php include($level.LAYOUT.'body_page_begin.php'); ?>
 
<?php if (isset($_GET['id'])){
    $id = $_GET['id']; 
} else {
    echo '<p>Ничего не обнаружено. </p>';
    include($level.LAYOUT.'body_page_bottom.php');
    echo '</body>';
    echo '</html>';
    exit();
}    
?>    
			               
<?php   $query  = "SELECT * ";
		$query .= " FROM txtdb ";
		$query .= " WHERE id = $id "; 
		$page_set = mysqli_query($connection, $query);
		// Test if there was a query error
		confirm_query($page_set);		
         
		if($row = mysqli_fetch_assoc($page_set)) {
            echo '<h2>';
            echo htmlentities($row['title']);
            echo '</h2>';
            echo '<p><i>';
            echo htmlentities($row['description']);
            echo '</i><p>';
            echo '<div>';
            echo $row['content'];
            echo '</div>';
        }
?>
    
    
<?php include($level.LAYOUT.'body_page_bottom.php'); ?>
</body>
</html>