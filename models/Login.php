<?php


class Users
{
    protected $id;
    protected $admin;
    protected $username;
    protected $email;
    protected $password;
    protected $created_at;
    protected $updated_at;

    public function __construct($id, $admin, $username, $email, $password, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->admin = $admin;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
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

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM users');
        foreach ($req->fetchAll() as $users) {
            $list[] = new Users($users['id'], $users['admin'], $users['username'], $users['email'], $users['password'], $users['created_at'], $users['updated_at']);
        }
        return $list;
    }


    public static function create($username, $email, $password) //this is for the registering new users part
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into users(username,email,password,created_at,updated_at) 
        values (:username,:email,:password,:created_at,:updated_at)");
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $password);
        $req->bindParam(':created_at', $created_at);
        $req->bindParam(':updated_at', $updated_at);
        //figure out inserting into created_at and updated_at;
        $req->execute();
    }
}