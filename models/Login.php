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

    
    public static function validate($email, $password)
    {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
                
        $req->execute(
                    array(
                        'email' => $_POST["email"],
                        'password' => $_POST["password"]
                    )
                );

        $users = $req->fetch();
        if ($users) {
            $_SESSION['email']=$users['email'];
            $_SESSION['password']=$users['password'];
            $_SESSION['is_admin']=$users['admin'];

//        }
//
//
//        $count = $req->rowCount();
//        if($count > 0)
//        {
//          $_SESSION["email"] = $_POST["email"];
          echo"you have logged in";

        } else {
            //replace with a more meaningful exception
            echo 'Account does not exist';
        }
    }

}