<?php include_once('thislevel.php');  // лишнее подключение к ДБ ?>
<?php confirm_logged_in(); ?>

<!DOCTYPE html>
<html lang="ru">
<head>
<?php     $title = "Admin";
          $description = "";
          include($level.LAYOUT.'head.php'); 
?>       
</head>

<body>
<?php include($level.LAYOUT.'body_admin_begin.php'); ?>  
      <div >
        <h2>Admin Menu</h2>
        <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]) ;?></p>
        <ul>
          <li><a href="addpage.php">Add page</a></li>
          <li><a href="addpage_tinymce.php">Add page with TinyMCE</a></li>
          <li><a href="manage_admins.php">Manage Admin Users</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div> 

<?php include($level.LAYOUT.'body_page_bottom.php'); ?>
</body>
</html>