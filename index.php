<?php
require_once('connection.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    //these variables are set either by the query parameters or by default!
    $controller = 'pages';
    $action = 'home';
}

require_once('layout.php');
