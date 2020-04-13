<?php
require 'models/Users.php';

class UsersController
{
    public function readAll()
    {
        // we store all the posts in a variable
        $users = Users::all();
        require_once('views/admin/users/readAll.php');
    }
//
//    public function read()
//    {
//        // we expect a url of form ?controller=posts&action=show&id=x
//        // without an id we just redirect to the error page as we need the post id to find it in the database
//        if (!isset($_GET['id'])) {
//            call('pages', 'error');
//            return;
//        }
//
//        try {
//            // we use the given id to get the correct post
//            $users = Users::find($_GET['id']);
//            require_once('views/includes/register.php');
//        } catch (Exception $ex) {
//            call('pages', 'error');
//        }
//    }

    public function create() //shall we rename this to register?
    {
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/admin/users/create.php');
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $passwordretype = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);


            if ($_POST['password'] != $_POST['password2']) {
                $passwordsnotequal = true;
                require_once('views/admin/users/create.php');
                return;
            }


            Users::create($username, $email, $password);
//            $this->readAll();
            require_once('views/pages/home.php');
        }
    }

     public function update()
    {
//case we are showing the edit form for a specific bodypart
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])){
                call('pages', 'error');
                return;
            }

            // we use the given id to get the correct product
            $id = Users::update($_GET['id']);
              $username = Users::update($_GET['username']);
                $email = Users::update($_GET['email']);
                  $password = Users::update($_GET['password']);
                    $passwordretype = Users::update($_GET['password2']);

            require_once('views/admin/users/update.php');
        } else { //case when we are writing the bodypart to the database
            
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $passwordretype = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);

            
            if ($_POST['password'] != $_POST['password2']) {
                $passwordsnotequal = true;
                require_once('views/admin/users/update.php');
                return;
            }

            Users::update($id, $username, $email, $password);

           $this->readAll();
           //   require_once('views/pages/home.php');
        }

    }

//   public function delete()
//    {
////case we are showing the edit form for a specific bodypart
//        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//            if (!isset($_GET['id'])){
//                call('pages', 'error');
//                return;
//            }
//
//            // we use the given id to get the correct product
//            $bodyPart = Users::find($_GET['id']);
//
//            require_once('views/admin/bodyparts/delete.php');
//        } else { //case when we are writing the bodypart to the database
//            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//
//            Users::remove($id,$part);
//
//            $this->readAll();
//        }
//    }


}
