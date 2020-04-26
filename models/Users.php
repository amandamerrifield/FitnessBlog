<?php
require_once 'password/Hashing.php';

class Users
{
    protected $id;
    protected $admin;
    protected $username;
    protected $email;
    protected $password;
    protected $photo;
    protected $created_at;
    protected $updated_at;
    protected $first_name;
    protected $user_content;

    public function __construct(
        $id,
        $admin,
        $username,
        $email,
        $password,
        $photo,
        $created_at,
        $updated_at,
        $first_name,
        $user_content
    )
    {
        $this->id = $id;
        $this->admin = $admin;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->photo = $photo;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->first_name = $first_name;
        $this->user_content = $user_content;
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

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getUserContent()
    {
        return $this->user_content;
    }

    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM users');
        foreach ($req->fetchAll() as $users) {
            $list[] = new Users($users['id'], $users['admin'], $users['username'], $users['email'], $users['password'], $users['photo'], $users['created_at'], $users['updated_at'], $users['first_name'], $users['user_content']);
        }
        return $list;
    }

    public static function read()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM users');
        foreach ($req->fetchAll() as $users) {
            $list[] = new Users(
                $users['id'],
                $users['admin'],
                $users['username'],
                $users['email'],
                $users['password'],
                $users['photo'],
                $users['created_at'],
                $users['updated_at'],
                $users['first_name'],
                $users['user_content']);
        }
        return $list;
    }

    public static function register($username, $email, $password) //this is for the registering new users part
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into users(username,email,password,created_at,updated_at,first_name,user_content) 
        values (:username,:email,:password,NOW(),NOW(),'','')");
        $hasher = Hashing::hashPassword($password);
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $hasher);
        $req->execute();

        $_SESSION['last_login_timestamp'] = time();
        $_SESSION['id'] = $db->lastInsertId();
        $_SESSION['username'] = $username;
        $_SESSION['is_admin'] = false;
    }

    public static function create($admin, $username, $email, $password, $first_name, $user_content) //this is for the registering new users part
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into users(admin,username,email,password,created_at,updated_at,first_name,user_content) 
        values (:admin,:username,:email,:password, NOW(),NOW(),:first_name,:user_content)");
        $hasher = Hashing::hashPassword($password);
        $req->bindParam(':admin', $admin);
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $hasher);
        $req->bindParam(':first_name', $first_name);
        $req->bindParam(':user_content', $user_content);
        $req->execute();
    }

    public static function find($id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT id, admin, username,email, password, photo, created_at, updated_at, first_name, user_content FROM users WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $users = $req->fetch();
        if ($users) {
            return new Users(
                $users['id'],
                $users['admin'],
                $users['username'],
                $users['email'],
                $users['password'],
                $users['photo'],
                $users['created_at'],
                $users['updated_at'],
                $users['first_name'],
                $users['user_content']);

        } else {
            //replace with a more meaningful exception
            throw new Exception('This user is not available');
        }
    }



//    public static function findOne($id)
//    {
//        $db = Db::getInstance();
//        //use intval to make sure $id is an integer
//        $id = intval($id);
//        $req = $db->prepare('SELECT id,first_name, username,email, password FROM users WHERE id = :id');
//        //the query was prepared, now replace :id with the actual $id value
//        $req->execute(array('id' => $id));
//        $users = $req->fetch();
//        if ($users) {
//            return new Users(
//                $users['id'],
//                $users['first_name'],
//                $users['username'],
//                $users['email'],
//                $users['password']);
//
//        } else {
//            //replace with a more meaningful exception
//            throw new Exception('This user is not available');
//        }
//    }


    public static function update($id, $admin, $username, $email, $password, $first_name, $user_content)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update users SET admin=:admin, username=:username, email=:email, password=:password, first_name=:first_name, user_content=:user_content where id=:id");
        $req->bindParam(':id', intval($id));
        $req->bindParam(':admin', $admin);
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $password);
        $req->bindParam(':first_name', $first_name);
        $req->bindParam(':user_content', $user_content);
        //  $req->bindParam(':updated_at', $updated_at);
        //$req = date_update table SET datetime =update_date_time;
        //$updated_at("INSERT INTO `table` (`dateposted`) VALUES (now())");
        // $date = date('Y-m-d H:i:s');
        //  $updated_at("INSERT INTO `table` (`dateposted`) VALUES ('$date')");

        $req->execute();
    }


    public static function updateOne($id, $first_name, $username, $email)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update users SET username=:username, email=:email, first_name=:first_name where id=:id");
        $req->bindParam(':id', intval($id));
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
//        $req->bindParam(':password', $password);
        // $req->bindParam(':photo', $photo);
        $req->bindParam(':first_name', $first_name);
        //  $req->bindParam(':updated_at', $updated_at);
        //$req = date_update table SET datetime =update_date_time;
        //$updated_at("INSERT INTO `table` (`dateposted`) VALUES (now())");
        // $date = date('Y-m-d H:i:s');
        //  $updated_at("INSERT INTO `table` (`dateposted`) VALUES ('$date')");

        $req->execute();
    }

    public static function remove($id)
    {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM users WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

}