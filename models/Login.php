<?php

require_once 'password/Hashing.php';

class Login
{

    protected $id;
    protected $admin;
    protected $username;
    protected $email;
    protected $password;

    public function __construct($id, $admin, $username, $email, $password)
    {
        $this->id = $id;
        $this->admin = $admin;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAdmin()
    {
        return $this->admin;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public static function validate($username, $password)
    {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM users WHERE username = :username");

        $req->execute(array('username' => $_POST["username"]));
        $user = $req->fetch();
        if (!$user) {
            //replace with a more meaningful exception
            //echo 'Account does not exist';
            //redirect('login', 'validateLogin');
            throw new Exception('This user does not exist.');
//            echo "<script>alert('THIS USER DOES NOT EXIST');
//                  window.location.href='index.php?controller=login&action=validateLogin';</script>";
        }

        if (!Hashing::isPasswordValid($_POST["password"], $user['password'])) {
            //replace with a more meaningful exception
            // echo 'Incorrect password';
            throw new Exception('You made a typo. Incorrect password');
        }

        $_SESSION['last_login_timestamp'] = time();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        //mysql translates true to 1, we want to te translate it back to boolean
        $_SESSION['is_admin'] = $user['admin'] == 1; //refactoring, evaluates to the same
    }

    public static function logout()
    {
        session_destroy();
    }

}
