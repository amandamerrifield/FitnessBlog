<?php
class Difficulty 
{
    protected $id ;
    protected $level;

    public function __construct($id, $level)
    {
        $this->id = $id;
        $this->level = $level;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLevel()
    {
        return $this->level;
    }
    
    
    
     public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM difficulty');
        // we create a list of Product objects from the database results
        foreach ($req->fetchAll() as $difficulty) {
            $list[] = new Difficulty($difficulty['id'], $difficulty['level']);
        }
        return $list;
        
         

    }

    public static function find($id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM difficulty WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $difficulty = $req->fetch();
        if ($difficulty) {
            return new Difficulty($difficulty['id'], $difficulty['level']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This level is not available');
        }
    }

    public static function update($id,$level)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update difficulty set level=:level where id=:id");
        $req->bindParam(':id', intval($id));
        $req->bindParam(':level', $level);
        $req->execute();
    }
    public static function create($level)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into difficulty(level) values (:level)");
        $req->bindParam(':level', $level);
        $req->execute();
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $level)
    {

        if (empty($_FILES[self::InputKey])) {
            //die("File Missing!");
            trigger_error("File Missing!");
        }

        if ($_FILES[self::InputKey]['error'] > 0) {
            trigger_error("Handle the error! " . $_FILES[self::InputKey]['error']);
        }


        if (!in_array($_FILES[self::InputKey]['type'], self::AllowedTypes)) {
            trigger_error("Handle File Type Not Allowed: " . $_FILES[self::InputKey]['type']);
        }

        $tempFile = $_FILES[self::InputKey]['tmp_name'];
        $path = "/Applications/XAMPP/xamppfiles/htdocs/FittnessBlog/views/images";
//        $path = "C:/xampp/htdocs/FitnessBlog/views/images/";
        $destinationFile = $path . $level . '.jpeg';

        if (!move_uploaded_file($tempFile, $destinationFile)) {
            trigger_error("Handle Error");
        }

        //Clean up the temp file
        if (file_exists($tempFile)) {
            unlink($tempFile);
        }
    }

    public static function remove($id)
    {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM difficulty WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }
   
}

