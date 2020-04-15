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

    public function __construct($id, $username, $email, $password)
    {
        $this->id = $id;
       //$this->admin = $admin;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
       // $this->created_at = $created_at;
       // $this->updated_at = $updated_at;
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
            $list[] = new Users($users['id'], $users['admin'], $users['name'], $users['content'], $users['username'], $users['email'], $users['password'], $users['created_at'], $users['updated_at']);
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
    
    public static function find($id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM users WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $users = $req->fetch();
        if ($users) {
            return new Users($users['id'], $users['username'], $users['email'], $users['password']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This user is not available');
        }
    }
    
      public static function update( $id, $username,  $email, $password)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update users SET username=:username, email=:email, password=:password where id=:id");
        $req->bindParam(':id', intval($id));
        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);
        $req->bindParam(':password', $password);
      //  $req->bindParam(':updated_at', $updated_at);
        //$req = date_update table SET datetime =update_date_time;
        //$updated_at("INSERT INTO `table` (`dateposted`) VALUES (now())");
        // $date = date('Y-m-d H:i:s');
       //  $updated_at("INSERT INTO `table` (`dateposted`) VALUES ('$date')");   
       
        $req->execute();
    }
    }
