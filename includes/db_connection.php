<?php
	define ("DB_SERVER", "localhost");
	define ("DB_USER", "bike4_user");
	define ("DB_PASS", "");
	define ("DB_NAME", "bike4");
    
  // 1. Create a database connection
  
  //$dbhost = "localhost";
  //$dbuser = "widget_cms";
  //$dbpass = "secretpassword";
  //$dbname = "widget_corp";
  //$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  
  // Test if connection unsucceeded
  if(mysqli_connect_errno()) {
    die("<br>"."Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>