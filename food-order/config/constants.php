<?php

//start session
session_start();



//Create Constants to store non repeating values

define('SITEURL','http://localhost/food-order/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');



//    execute query and save it in the database

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn)); //database connection
$db_select = mysqli_select_db($conn ,DB_NAME) or die(mysqli_error($conn)); //selecting database


?>