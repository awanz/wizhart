<?php 

// database
$dbhost = "localhost";
$dbname = "wizhart";
$dbuser = "root";
$dbpass = "";
$dbcharset = "utf8";

function base_url($page = null){
    $url = "http://localhost/wizh/control/";
    $result = $url . $page;
    return $result;
}