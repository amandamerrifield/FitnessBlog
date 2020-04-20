<?php
require_once 'models/Login.php';
require_once 'utilities.php';

class LoginController
{

    public function validateLogin()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            show_view('views/admin/login/validateLogin.php');
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            
            
            if (empty($_POST['username']) || empty($_POST['password'])) {
                echo "Please enter all of the values!";
            } else {
                try {
                    Login::validate($username, $password);
                } catch (Exception $e) {
                    show_view('views/admin/login/validateLogin.php', ['message' => $e->getMessage()]);
                    return;
                }
            }
            //show_view('views/index.php');
            redirect('pages', 'home');
        }
    }
    
    public function logout() 
    {
        //removed the if statement 
        Login::logout();
        redirect('pages', 'home');
    }
}