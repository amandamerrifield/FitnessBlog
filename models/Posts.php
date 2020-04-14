<?php

class Posts

{
    protected $id;
    protected $user_id;
    protected $exercise_name;
    protected $body_part_id;
    protected $difficulty_id;
    protected $description;

    public function __construct($id, $user_id, $exercise_name, $body_part_id, $difficulty_id, $description)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->exercise_name = $exercise_name;
        $this->body_part_id = $body_part_id;
        $this->difficulty_id = $difficulty_id;
        $this->description = $description;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getExerciseName()
    {
        return $this->exercise_name;
    }

    public function getBodyPartId()
    {
        $this->body_part_id;
    }


    public function getDifficultyId()
    {
        return $this->difficulty_id;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function getPhoto()
    {
        return $this->photo;
    }

    public function readAll ($id, $user_id, $exercise_name, $body_part_id, $difficulty_id,$description) //$description, $user_id, $exercisename)
    {
       $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');
        foreach ($req->fetchAll() as $posts) {
            $list[] = new Posts($posts['id'], $posts['user_id'], $posts['exercise_name'], $posts['body_part_id'], $posts['difficulty_id'], $posts['description'], $posts['photo']);
        }
        return $list;
    }

    public static function findByExercise($id, $exercisename)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id AND exercise_name= :exercise_name');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id, 'exercise_name'=>$exercisename));
        $posts = $req->fetch();
        if ($posts) {
            return new Posts($posts['id'], $posts['exercise_name']);
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
        $req = $db->prepare("Update posts SET user_id=:user_id, exercise_name=:exercise_name,body_part_id=:body_part_id, difficulty_id=:difficulty_id, description=:description, photo=:photo WHERE id=:id");
        $id = intval($id);
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':exercise_name', $exercise_name);
        $req->bindParam(':body_part_id', $body_part_id);
        $req->bindParam(':difficulty_id', $difficulty_id);
        $req->bindParam(':description', $description);
        $req->bindParam(':photo', $photo);
        $req->execute();
    }
    public static function create($user_id, $exercise_name, $body_part_id, $difficulty_id, $description)
    {
        $db = Db::getInstance();
        $req->bindParam(':id', intval($id));
        $req = $db->prepare("INSERT INTO posts (user_id, exercise_name,body_part_id, difficulty_id, description, photo) VALUES (:user_id, :exercise_name, :body_part_id, :difficulty_id, :description, :photo)");
        $id = intval($id);
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':exercise_name', $exercise_name);
        $req->bindParam(':body_part_id', $body_part_id);
        $req->bindParam(':difficulty_id', $difficulty_id);
        $req->bindParam(':description', $description);
        $req->bindParam(':photo', $photo);
        $req->execute();
    }

    const AllowedTypes = ['image/jpeg', 'image/jpg'];
    const InputKey = 'myUploader';

//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $posts)
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

