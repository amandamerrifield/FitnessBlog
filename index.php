<?php

require_once ('routes.php');
require_once('connection.php');
$route = new Routes();

$route-> add('/');
$route-> add ('/body_part');
$route-> add ('/aboutUs');
$route->add('/Difficulty');

echo '<pre>'; //which makes sure these are being added

print_r($route);
//In order to submit a new uri 
$route->submit();

//if (isset($_GET['controller']) && isset($_GET['action'])) {
//    $controller = $_GET['controller'];
//    $action = $_GET['action'];
//} else {
//    //these variables are set either by the query parameters or by default!
//    $controller = 'pages';
//    $action = 'home';
//}
//
//require_once('views/layout.php');
//
//function_autoload($class_name){
//    require_once ''.$class_name.'.php';
//}