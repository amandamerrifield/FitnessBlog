<?php

//class BodyPartsController {
//
//    public function create() {
//        require_once('views/admin/bodyparts/createBodyPart.php');
//    }
//}


class DifficultyController
{
    public function readAll()
    {
        // we store all the posts in a variable
        $level = Difficulty::all();
        require_once('views/admin/difficulty/readAllLevel.php');
    }

    public function read()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('pages', 'error');
        
        try {
            // we use the given id to get the correct post
            $level = Difficulty::find($_GET['id']);
            require_once('views/admin/difficulty/indexLevel.php');
        } catch (Exception $ex) {
            return call('pages', 'error');
        }
    }

    public function create()
    {
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/admin/difficulty/createLevel.php');
        } else {
            $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
            BodyPart::create($level);
            $this->readAllLevel();
        }

    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id']))
                return call('pages', 'error');

            // we use the given id to get the correct product
            $level = Difficulty::find($_GET['id']);

            require_once('views/admin/difficulty/editLevel.php');
        } else {
            $id = $_GET['id'];
            Difficulty::update($id);

            $level = Difficulty::all();
            require_once('views/admin/difficulty/editLevel.php');
        }

    }

    public function delete()
    {
        Difficulty::remove($_GET['id']);

        $level = Difficulty::all();
        require_once('views/admin/difficulty/deleteLevel.php');
    }

}


