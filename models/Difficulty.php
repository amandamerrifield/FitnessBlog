<?php


class DB {
    
    private static $instance = NULL;

    //Singleton Design Pattern
    public static function getInstance() {
      if (!isset(self::$instance)) {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$instance = new PDO(
            'mysql:host=localhost;dbname=exercises',
            'trainer',
            'trainer#4',
            $pdo_options);
      }
      return self::$instance;
    }
}




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
        foreach ($req->fetchAll() as $level) {
            $list[] = new Difficulty($level['id'], $level['level']);
            var_dump($list);
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
        $level = $req->fetch();
        if ($level) {
            return new Difficulty($level['id'], $level['level']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This difficulty is not available');
        }
    }

    public static function update($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update difficulty set level=:level where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':level', $level);

// set name and price parameters and execute
        if (isset($_POST['level']) && $_POST['level'] != "") {
            $filteredLevel = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $level = $filteredLevel;
        $req->execute();


//upload product image if it exists
        if (!empty($_FILES[self::InputKey]['level'])) {
            Difficulty::uploadFile($level);
        }

    }

    public static function creat($level)
    {
        $db = Db::getInstance();
//        $level= $_POST['level'];
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

//$testObject = new Difficulty(1, 'hard');

//$testObject->all();
