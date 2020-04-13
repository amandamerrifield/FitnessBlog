<?php
//write select statement here
class homePageSearch
{
    private $id;
    private $user_id;
    private $exercise_name;
    private $body_part_id;
    private $difficulty_id;
    private $description;

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

    public function getBodyPartId($body_part_id)
    {
        $this->body_part_id = $body_part_id;
    }


    public function getDifficultyId()
    {
        return $this->difficulty_id;
    }

    public function getDescription()
    {
        return $this->description;
    }


    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');
        // we create a list of Body Part objects from the database results
        foreach ($req->fetchAll() as $posts) {
            $list[] = new Posts($posts['id']);
        }
        return $list;
    }

public static function findByExercise($exercise_name)
    {
        $db = Db::getInstance();
        //use intval to make sure $id is an integer
        $req = $db->prepare('SELECT * FROM posts WHERE exercise_name = :exercise_name');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('exercise_name'=>$exercise_name));
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
       public static function findByBodyPart ($body_part_id)
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
}}