<?php
//session_start();
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

require_once('views/layout.php');
// slash works on both mac and win but \ only works on win
