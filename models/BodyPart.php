<?php

class BodyPart
{
    private $id;
    private $part;

    private function __construct($id, $part)
    {
        $this->id = $id;
        $this->part = $part;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setPart($part)
    {
        $this->part = $part;
    }
}
