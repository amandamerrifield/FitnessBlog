<?php
require_once 'models/Users.php';
require_once 'utilities.php';

class UsersController
{
    public function readAll()
    {
        show_view('views/admin/users/readAll.php', ['users' => Users::all()]);
    }

    public function readOne()
    {
        show_view('views/admin/users/readOne.php', ['user' => Users::find($_SESSION['id'])]);
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

    public function register() //shall we rename this to register?
    {
        $passwordsnotequal = false;
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            show_view('views/admin/users/register.php');
        } else {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $passwordretype = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);


            if ($_POST['password'] != $_POST['password2']) {
                show_view('views/admin/users/create.php', ['passwordsnotequal' => true]);
                return;
            }


            Users::register($username, $email, $password);
            redirect('pages', 'home');
        }
    }

    public function create() //shall we rename this to register?
    {
        $passwordsnotequal = false;
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            show_view('views/admin/users/create.php');
        } else {
            $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $passwordretype = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);
            $admin = filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_SPECIAL_CHARS);
            $user_content = filter_input(INPUT_POST, 'user_content', FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($_POST['password'] != $_POST['password2']) {
                show_view('views/admin/users/create.php', ['passwordnotequal' => true]);
                return;
            }


            Users::create($id, $admin, $username, $email, $password, $photo, $created_at, $updated_at, $first_name, $user_content);
            $this->readAll();
            show_view('views/pages/home.php');
        }
    }

    public function update()
    {
//case we are showing the edit form for a specific bodypart
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])) {
                call('pages', 'error');
                return;
            }
            show_view('views/admin/users/update.php', ['users'=> Users::find($_GET['id'])]);
        } else { //case when we are writing the bodypart to the database

            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $passwordretype = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);
            $admin = filter_input(INPUT_POST, 'admin', FILTER_SANITIZE_SPECIAL_CHARS);
            $user_content = filter_input(INPUT_POST, 'user_content', FILTER_SANITIZE_SPECIAL_CHARS);
            $photo = filter_input(INPUT_POST, 'photo', FILTER_SANITIZE_SPECIAL_CHARS);

            if ($_POST['password'] != $_POST['password2']) {
                show_view('views/admin/users/update.php', ['passwordnotequal' => true]);
                return;
            }

            Users::update($id, $admin, $username, $email, $password, $photo, $created_at, $updated_at, $first_name, $user_content);
            redirect('users','readAll');
        }
    }

    public function read()
    {
        show_view('views/admin/users/read.php', ['users' => Users::read()]);
    }
//
// 

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
