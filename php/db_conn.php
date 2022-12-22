<?php
$snome = "localhost";
$unome = "root";
$password="";

$db_name="my_db";

$conn = mysqli_connect($snome, $unome, $password, $db_name);

if(!$conn){
   echo "Connection failed!";
}




?>