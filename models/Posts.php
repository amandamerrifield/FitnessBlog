<?php

class Posts {

    protected $id;
    protected $user_id;
    protected $user_first_name;
    protected $exercise_name;
    protected $body_part_id;
    protected $body_part;
    protected $difficulty_id;
    protected $difficulty;
    protected $description;
    protected $created_at;
    protected $has_photo;

    public function __construct($id,
                                $user_id,
                                $user_first_name,
                                $exercise_name,
                                $body_part_id,
                                $body_part,
                                $difficulty_id,
                                $difficulty,
                                $description,
                                $created_at,
                                $photo_type) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->user_first_name = $user_first_name;
        $this->exercise_name = $exercise_name;
        $this->body_part_id = $body_part_id;
        $this->body_part = $body_part;
        $this->difficulty_id = $difficulty_id;
        $this->difficulty = $difficulty;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->has_photo = $photo_type != null;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getFirstName() {
        return $this->user_first_name;
    }

    public function getExerciseName() {
        return $this->exercise_name;
    }

    public function getBodyPartId() {
        return $this->body_part_id;
    }

    public function getBodyPart() {
        return $this->body_part;
    }

    public function getDifficultyId() {
        return $this->difficulty_id;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function hasPhoto() {
        return $this->has_photo;
    }

    public function readAll() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT p.id, p.user_id, u.username as username, u.first_name as first_name, b.part AS body_part, p.exercise_name, p.body_part_id, p.difficulty_id, d.level as difficulty, p.description, p.created_at, p.photo_type
FROM posts AS p
    INNER JOIN users AS u ON p.user_id = u.id
    INNER JOIN bodyPart AS b ON p.body_part_id = b.id
    INNER JOIN difficulty AS d ON p.difficulty_id = d.id
ORDER BY created_at DESC;');
        foreach ($req->fetchAll() as $posts) {
            $list[] = new Posts(
                $posts['id'],
                $posts['user_id'],
                empty($posts['username']) ? $posts['first_name'] : $posts['username'],
                $posts['exercise_name'],
                $posts['body_part_id'],
                $posts['body_part'],
                $posts['difficulty_id'],
                $posts['difficulty'],
                $posts['description'],
                $posts['created_at'],
                $posts['photo_type']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT id, user_id, exercise_name, body_part_id, difficulty_id, description, created_at, photo_type  FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));
        $post = $req->fetch();
        if ($post) {
            return new Posts(
                $post['id'],
                $post['user_id'],
                '',
                $post['exercise_name'],
                $post['body_part_id'],
                '',
                $post['difficulty_id'],
                '',
                $post['description'],
                $post['created_at'],
                $post['photo_type']);
        } else {
            throw new Exception('This post is not available');
        }
    }

    public static function findByBodyPart($body_part_id) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT p.id, p.user_id, u.username as username, u.first_name as first_name, b.part AS body_part, p.exercise_name, p.body_part_id, p.difficulty_id, d.level as difficulty, p.description, p.created_at, p.photo_type
FROM posts AS p
    INNER JOIN users AS u ON p.user_id = u.id
    INNER JOIN bodyPart AS b ON p.body_part_id = b.id
    INNER JOIN difficulty AS d ON p.difficulty_id = d.id
WHERE body_part_id = :body_part_id');
        //the query was prepared, now replace :body_part_id with the actual $body_part_id value
        $req->execute(array('body_part_id' => $body_part_id));
        foreach ($req->fetchAll() as $posts) {
            $list[] = new Posts(
                $posts['id'],
                $posts['user_id'],
                empty($posts['username']) ? $posts['first_name'] : $posts['username'],
                $posts['exercise_name'],
                $posts['body_part_id'],
                $posts['body_part'],
                $posts['difficulty_id'],
                $posts['difficulty'],
                $posts['description'],
                $posts['created_at'],
                $posts['photo_type']);
        }
        return $list;
    }

    public static function findByDifficulty($difficulty_id) {
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT p.id, p.user_id, u.username as username, u.first_name as first_name, b.part AS body_part, p.exercise_name, p.body_part_id, p.difficulty_id, d.level as difficulty, p.description, p.created_at, p.photo_type
FROM posts AS p
    INNER JOIN users AS u ON p.user_id = u.id
    INNER JOIN bodyPart AS b ON p.body_part_id = b.id
    INNER JOIN difficulty AS d ON p.difficulty_id = d.id
WHERE difficulty_id = :difficulty_id');
        //the query was prepared, now replace :id with the actual $id value
        $req->execute(array('difficulty_id' => $difficulty_id));
        foreach ($req->fetchAll() as $posts) {
            $list[] = new Posts(
                $posts['id'],
                $posts['user_id'],
                empty($posts['username']) ? $posts['first_name'] : $posts['username'],
                $posts['exercise_name'],
                $posts['body_part_id'],
                $posts['body_part'],
                $posts['difficulty_id'],
                $posts['difficulty'],
                $posts['description'],
                $posts['created_at'],
                $posts['photo_type']);
        }
        return $list;
    }
    
    
        public static function update($id, $exercise_name, $description) {
        $db = Db::getInstance();
        $req = $db->prepare("Update posts SET exercise_name=:exercise_name, description=:description WHERE id=:id");
        $req->bindParam(':id', intval($id));
        $req->bindParam(':exercise_name', $exercise_name);
//        $req->bindParam(':body_part_id', $body_part_id);
//        $req->bindParam(':difficulty_id', $difficulty_id);
        $req->bindParam(':description', $description);
        $req->execute();
    }
    

    public static function create($user_id, $exercise_name, $body_part_id, $difficulty_id, $description, $created_at) {
        $db = Db::getInstance();
        $req = $db->prepare("INSERT INTO posts (user_id, exercise_name, body_part_id, difficulty_id, description, created_at) VALUES (:user_id, :exercise_name, :body_part_id, :difficulty_id, :description, NOW())");
        $req->bindParam(':user_id', $user_id);
        $req->bindParam(':exercise_name', $exercise_name);
        $req->bindParam(':body_part_id', $body_part_id);
        $req->bindParam(':difficulty_id', $difficulty_id);
        $req->bindParam(':description', $description);
        //$req->bindParam(':created_at', $created_at);
        $req->execute();
    }
    
//   public static function findByExercise($id, $exercisename)
//    {
//        $db = Db::getInstance();
//        //use intval to make sure $id is an integer
//        $req = $db->prepare('SELECT * FROM posts WHERE id = :id AND exercise_name= :exercise_name');
//        //the query was prepared, now replace :id with the actual $id value
//        $req->execute(array('id' => $id, 'exercise_name' => $exercisename));
//        $posts = $req->fetch();
//        if ($posts) {
//            return new Posts($posts['id'], $posts['exercise_name']);
//        } else {
//            //replace with a more meaningful exception
//            throw new Exception('This exercise is not available');
//        }
//    }
//    public static function findByAuthor($id, $user_id)
//    {
//        $db = Db::getInstance();
//        //use intval to make sure $id is an integer
//        $id = intval($id);
//        $req = $db->prepare('SELECT * FROM posts WHERE user_id = :user_id');
//        //the query was prepared, now replace :id with the actual $id value
//        $req->execute(array('user_id' => $user_id));
//        $posts = $req->fetch();
//        if ($posts) {
//            return new Posts($posts['user_id']);
//        } else {
//            //replace with a more meaningful exception
//            throw new Exception('This author has not posted anything');
//        }
//    }




//    const AllowedTypes = ['image/jpeg', 'image/jpg'];
//    const InputKey = 'myUploader';
//die() function calls replaced with trigger_error() calls
//replace with structured exception handling
    public static function uploadFile(string $posts) {

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

    public static function remove($id) {
        $db = Db::getInstance();
        //make sure $id is an integer
        $id = intval($id);
        $req = $db->prepare('delete FROM posts WHERE id = :id');
        // the query was prepared, now replace :id with the actual $id value
        $req->execute(array('id' => $id));
    }

}
