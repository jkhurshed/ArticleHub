<?php 
  include_once("log.php");

	$DB_HOST = 'localhost';
	$DB_USER = 'admin';
	$DB_PASSWORD = 'testpass';
	$DB_NAME = 'compose';

  try {
    $db = new mysqli($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
    
    // Check connection
    if ($db -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    } 
  } catch (Exception $e) {
    new Log($e);
  }
?>