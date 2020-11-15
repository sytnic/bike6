<?php   include_once('thislevel.php');   
        require_once($level.'includes/validation_functions.php');

$username = "";

if (isset($_POST['submit'])) {
  // Process the form
  
  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);  
  ////////////////
    
  if (empty($errors)) {
    // Пробуем войти
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$found_admin = attempt_login($username, $password); // array
	
    if ($found_admin) {
      // Success
	  // Пометить пользователя как вошедшего     
	  $_SESSION["admin_id"] = $found_admin["id"];
	  $_SESSION["username"] = $found_admin["username"];
      redirect_to("admin.php");
    } else {
      // Failure
      $_SESSION["message"] = "Username/password not found.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))


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
<?php include($level.LAYOUT.'body_admin_begin.php'); ?>    
    <h1>Admin</h1>
    
<?php    if (logged_in()) { ?>
    <p>Welcome to the admin area, <?php echo htmlentities($_SESSION["username"]) ;?>. <a href="admin.php">Admin page</a> </p>    
<?php  } ?>    
    
    <div>    
    <?php echo message(); 
          echo form_errors($errors); ?>

        <h2>Login</h2>
            <form action="login.php" method="post">
               <p>Username: <input type="text" name="username" value="<?php echo htmlentities($username);?>" /></p>
               <p>Password: <input type="password" name="password" value="" /></p>
                <input type="submit" name="submit" value="Log in" />
            </form>
    </div>   
<?php include($level.LAYOUT.'body_page_bottom.php'); ?>
</body>
</html>