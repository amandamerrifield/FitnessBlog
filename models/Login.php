<?php


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
        $req = $db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
                
        $req->execute(
                    array(
                        'username' => $_POST["username"],
                        'password' => $_POST["password"]
                    )
                );

        $users = $req->fetch();
        if ($users) {
            $_SESSION['username']=$users['username'];
            $_SESSION['password']=$users['password'];
            if ($users['admin']==1){ //mysql translates true to 1, we want to te translate it back to true
                $_SESSION['is_admin'] = true;
            }
            else {
                $_SESSION['is_admin'] = false;
            }

           // $_SESSION['last_login_timestamp'] = time();
//        }

          echo"you have logged in";

        } else {
            //replace with a more meaningful exception
            echo 'Account does not exist';
        }
    }
    
    
    public static function logout()
    {
        session_destroy();
    }
    

}