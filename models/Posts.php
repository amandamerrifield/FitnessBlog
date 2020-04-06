<?php

class Posts

{
    private $id;
    private $user_id;
    private $exercise_name;
    private $body_part_id;
    private $difficulty_id;
    private $description;

    private function __construct($id, $user_id, $exercise_name, $body_part_id, $difficulty_id, $description)
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
}

//add function form image upload