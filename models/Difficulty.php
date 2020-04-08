<?php

class Difficulty
{
    protected $id;
    protected $level;

    protected function __construct($id, $level)
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
        $req = $db->query('SELECT * FROM bodyPart');
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
        $req = $db->prepare('SELECT * FROM bodyPart WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
        $product = $req->fetch();
        if ($product) {
            return new BodyPart($product['id'], $product['part']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This bodypart is not available');
        }
    }

    public static function update($id)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Update bodyPart set part=:part where id=:id");
        $req->bindParam(':id', $id);
        $req->bindParam(':part', $part);

// set name and price parameters and execute
        if (isset($_POST['part']) && $_POST['part'] != "") {
            $filteredPart = filter_input(INPUT_POST, 'part', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $part = $filteredPart;
        $req->execute();


//upload product image if it exists
        if (!empty($_FILES[self::InputKey]['part'])) {
            BodyPart::uploadFile($part);
        }

    }

    public static function add()
    {
        $db = Db::getInstance();
//        $part= $_POST['part'];
        $req = $db->prepare("Insert into bodyPart(part) values (:part)");
        $req->bindParam(':part', $part);

// set parameters and execute
        if (isset($_POST['part']) && $_POST['part'] != "") {
            $filteredPart = filter_input(INPUT_POST, 'part', FILTER_SANITIZE_SPECIAL_CHARS);
        }
        $part = $filteredPart;
        $req->execute();

//upload product image
        Product::uploadFile($part);
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $part)
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
        $destinationFile = $path . $part . '.jpeg';

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
        $req = $db->prepare('delete FROM bodyPart WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }
   
}

//
//all($list);
echo'hi';