<?php
function show_view($view_path, $view_vars = []) {
    foreach ($view_vars as $var_name => $var_value) {
        $$var_name = $var_value; // declare each element in array as a new variable, to be used in the view
    }
    require_once('views/layout.php');
}

function redirect($controller, $action) {
    header("Location: /index.php?controller=$controller&action=$action");
    die();
}
