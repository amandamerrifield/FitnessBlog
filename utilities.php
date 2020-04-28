<?php
function show_view($view_path, $view_vars = []) {
    foreach ($view_vars as $var_name => $var_value) {
        $$var_name = $var_value; // declare each element in array as a new variable, to be used in the view
    }
    require_once('views/layout.php');
}

function redirect($controller, $action, $query_params = []) {
    $url = "index.php?controller=$controller&action=$action";
    if (!empty($query_params)) {
        $url .= "&" . http_build_query($query_params);
    }
    header("Location: $url");
    die();
}

function redirectToHomeIfNotLoggedIn() {
    if (!$_SESSION['id']) {
        redirect('pages', 'home');
    }
}