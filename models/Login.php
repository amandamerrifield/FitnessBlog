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
        $users = $req->fetch();
        if ($users) {
            $_SESSION['username']=$users['username'];
            $_SESSION['id']=$users['id'];
            $_SESSION['password']=$users['password'];
            if ($users['admin']==1){ //mysql translates true to 1, we want to te translate it back to true
                $_SESSION['is_admin'] = true;
            }
            else {
                $_SESSION['is_admin'] = false;
            }

            $_SESSION['last_login_timestamp'] = time();
        } else {
            //replace with a more meaningful exception
            echo 'Account does not exist';
            return;
        }

        if (!Hashing::isPasswordValid($_POST["password"], $users['password'])) {
            //replace with a more meaningful exception
            echo 'Incorrect password';
            return;
        }

        $_SESSION['username']=$users['username'];
        $_SESSION['password']=$users['password'];

        //mysql translates true to 1, we want to te translate it back to boolean
        $_SESSION['is_admin'] = $users['admin']==1; //refactoring, evaluates to the same

        echo "you have logged in";
    }
    
    
    public static function logout()
    {
        session_destroy();
    }
    
}