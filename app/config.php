<?php 
session_start();

// database initialiation
$servername = "localhost";
$username   = "root";
$password   = "";
$db_name    = "product_management_code";


// Create connection
$conn =  mysqli_connect($servername, $username, $password,$db_name);
mysqli_set_charset($conn,"utf8");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}





// define base url 
define("URL","http://127.0.0.1:8081/G5/pms/");
define("FOLDER_PATH","");
define("PREV_FOLDER","../");
define("HANDELER_FOLDER","../../app/");


// set container for errors 
$errors = [];


// helper functions 
function url($url=''){
    echo URL . $url.".php";
}

function full_url($url=''){
    echo URL . $url;
}

function getFile($path){
    require_once $path .".php";
}

// for count 
function iteration(){
    static $i=1;
    echo $i;
    $i++;
}

// die and dump
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
    die();
    exit();
}
function redirect($url=''){
    header("location:".URL.$url.".php");
    exit;
    die;
}
// dire of file 
define("FILE_DIRE",__DIR__);