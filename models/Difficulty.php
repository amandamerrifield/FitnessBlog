<?php

class Difficulty
{
    private $id;
    private $level;

    private function __construct($id, $level)
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
}