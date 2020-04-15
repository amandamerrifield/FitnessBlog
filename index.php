<?php
require_once('connection.php');
session_start();
if (isset($_SESSION["username"]))
{
    if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    } else {
    //these variables are set either by the query parameters or by default!
    $controller = 'pages';
    $action = 'home';
    }

    require_once('views/layout.php');
    // slash works on both mac and win but \ only works on win

    if((time() - $_SESSION['last_login_timestamp']) > 10)
    {
        session_destroy();
        echo 'you have been logged out';
        
    }else{
        $_SESSION['last_login_timestamp'] = time();
    }
    
    
}else{
    //require_once 'views/pages/home.php';
//}
    
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    //these variables are set either by the query parameters or by default!
    $controller = 'pages';
    $action = 'home';
}

require_once('views/layout.php');
// slash works on both mac and win but \ only works on win

}