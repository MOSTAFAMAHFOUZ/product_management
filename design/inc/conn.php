<?php 

$host = "localhost";
$user = "super_admin";
$password = "super_admin";
$dbase = "product_management";

// connectio 

$conn = mysqli_connect($host,$user,$password,$dbase);
if(!$conn){
    die("connection error :" . mysqli_connect_error());
    exit();
}

