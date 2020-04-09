<?php

//class BodyPartsController {
//
//    public function create() {
//        require_once('views/admin/bodyparts/createBodyPart.php');
//    }
//}
require_once 'models/Difficulty.php';

class DifficultyController
{
    public function readAll()
    {
        // we store all the posts in a variable
        $difficulty = Difficulty::all();
        require_once('views/admin/difficulty/readAll.php');
    }

    public function read()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id'])){
            call('pages', 'error');
            return;
        }
        try {
            // we use the given id to get the correct post
            $difficulty = Difficulty::find($_GET['id']);
            require_once('views/admin/difficulty/read.php');
        } catch (Exception $ex) {
            call('pages', 'error');
        }
    }

    public function create()
    {
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/admin/difficulty/create.php');
        } else {
            $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);
            Difficulty::create($level);
            $this->readAll();
        }

    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])){
                call('pages', 'error');
                ruturn;
            }

            // we use the given id to get the correct product
            $difficulty = Difficulty::find($_GET['id']);

            require_once('views/admin/difficulty/update.php');
        } else {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $level = filter_input(INPUT_POST, 'level', FILTER_SANITIZE_SPECIAL_CHARS);

            Difficulty::update($id,$level);

            $this->readAll();
        }

    }

    public function delete()
    {
//case we are showing the edit form for a specific bodypart
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])){
                call('pages', 'error');
                return;
            }

            // we use the given id to get the correct product
            $difficulty = Difficulty::find($_GET['id']);

            require_once('views/admin/difficulty/delete.php');
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

            Difficulty::remove($id);

            $this->readAll();
        }
    }

}


