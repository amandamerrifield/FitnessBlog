<?php
require_once('connection.php');
session_start();

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    //these variables are set either by the query parameters or by default!
    $controller = 'pages';
    $action = 'home';
}

if (isset($_SESSION["username"])) {
    if ((time() - $_SESSION['last_login_timestamp']) > 1000) {
        session_destroy();
    } else {
        $_SESSION['last_login_timestamp'] = time();
    }
}

require_once('routes.php');
