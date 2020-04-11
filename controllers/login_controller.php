<?php
require 'models/Login.php';

class LoginController
{

    public function validateLogin()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/admin/login/validateLogin.php');
        } else {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            if (empty($_POST['email']) || empty($_POST['password'])) {
                echo "Please enter all of the values!";
            }
             Login::validate($email, $password);
             
             require_once('views/pages/home.php');
        }
    }
}