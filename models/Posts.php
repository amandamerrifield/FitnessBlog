<?php

class Posts

{
    public $id;
    public $user_id;
    public $exercise_name;
    public $body_part_id;
    public $difficulty_id;
    public $description;
    public $test= 'this is a test';
    public $test2=['hello', 'world'];
    public $all=[];
    public $quantityElements;
    
    public function __construct()
    {
        $this->id = 'hello';
        $this->user_id ='world';
        $this->exercise_name = 'this';
        $this->body_part_id = 'is';
        $this->difficulty_id = 'me';
        $this->description = '..';
    }
    
//    public function __construct($id, $user_id, $exercise_name, $body_part_id, $difficulty_id, $description)
//    {
//        $instance= new self();
//        $this->id = $id;
//        $this->user_id = $user_id;
//        $this->exercise_name = $exercise_name;
//        $this->body_part_id = $body_part_id;
//        $this->difficulty_id = $difficulty_id;
//        $this->description = $description;
//    }
//
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    public function getUserId()
//    {
//        return $this->user_id;
//    }
//
//    public function getExerciseName()
//    {
//        return $this->exercise_name;
//    }
//
//    public function getBodyPartId($body_part_id)
//    {
//        $this->body_part_id = $body_part_id;
//    }
//
//
//    public function getDifficultyId()
//    {
//        return $this->difficulty_id;
//    }
//
//    public function getDescription()
//    {
//        return $this->description;
//    }

    public function readAll () //$description, $user_id, $exercisename)
    {
        $db = Db::getInstance();
        $all = $db->query('SELECT * FROM posts');
        // we create a list of Product objects from the database results
//        foreach ($req->fetchAll() as $posts) {
//            $list[] = new Posts($posts['id']);
//        }  
        $quantityElements= 10;
        
       
    }

    public static function findByExercise($id, $exercisename)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id, 'exercisename'=>$exercisename));
        $posts = $req->fetch();
        if ($posts) {
            return new Posts($posts['id'], $posts['exercisename']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This exercise is not available');
        }
    }
        public static function findByDifficulty($id,$difficulty)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE difficulty = :difficulty');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id'=>$id, 'difficulty' => $difficulty));
        $posts = $req->fetch();
        if ($posts) {
            return new Posts($posts['id'], $posts['difficulty']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This level is not available');
        }
    }
       public static function findByBodyPart ($id,$body_part_id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE body_part_id = :body_part_id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('body_part_id' => $body_part_id));
        $posts = $req->fetch();
        if ($posts) {
            return new Posts($posts['body_part_id']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('No exercises for this body part');
        }
    }
     public static function findByAuthor($id, $user_id)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE user_id = :user_id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('user_id' => $user_id));
        $posts = $req->fetch();
        if ($posts) {
            return new Posts($posts['user_id']);
        } else {
            //replace with a more meaningful exception
            throw new Exception('This author has not posted anything');
        }
    }
    

    public static function update($user_id, $exercise_name, $body_part_id, $difficulty_id, $description)
    {
        $db = Db::getInstance();
        $req->bindParam(':id', intval($id));
        $req = $db->prepare("Update user_id set user_id=:user_id where id=:id");
        $req->bindParam(':user_id', $user_id);
        $req = $db->prepare("Update exercise_name set exercise_name=:exercise_name where id=:id");
        $req->bindParam(':exercise_name', $exercise_name);
        $req = $db->prepare("Update body_part_id set body_part_id=:body_part_id where id=:id");
        $req->bindParam(':body_part_id', $body_part_id);
        $req = $db->prepare("Update difficulty set level=:level where id=:id");
        $req->bindParam(':difficulty_id', $difficulty_id);
        $req = $db->prepare("Update description set description=:description where id=:id");
        $req->bindParam(':description', $description);
        $req->execute();
    }
    public static function create($user_id, $exercise_name, $body_part_id, $difficulty_id, $description)
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
        $req = $db->prepare('delete FROM posts WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }
   
}

