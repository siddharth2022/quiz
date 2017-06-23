<?php
    //ini_set('display_errors',1);
    //ini_set('display_startup_errors',1);
    //error_reporting(-1);

	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = 'root';
	$db_base = 'quiz_master';

	session_start();

	//$DB=mysqli_connect($db_host,$db_user,$db_pass,$db_base);
  $DB=new mysqli($db_host,$db_user,$db_pass,$db_base);
  if($DB->connect_error) {
    die("Could not connect ..!");
  }
?>
