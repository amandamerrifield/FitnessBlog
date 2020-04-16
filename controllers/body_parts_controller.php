<?php
require_once 'models/BodyPart.php';


class BodyPartsController
{
    public function readAll()
    {
        // we store all the posts in a variable
        $bodyParts = BodyPart::all();
        require_once('views/admin/bodyparts/readAll.php');
        //require_once('views/admin/post/create.php');
    }

    
    public function readAll2()
    {
        // we store all the posts in a variable
        $bodyParts = BodyPart::all();
        require_once('views/admin/post/create.php');
        //require_once('views/admin/post/create.php');
    }
    
    public function read()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id'])) {
            call('pages', 'error');
            return;
        }
        
        try {
            // we use the given id to get the correct post
            $product = BodyPart::find($_GET['id']);
            require_once('views/admin/bodyparts/read.php');
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
            require_once('views/admin/bodyparts/create.php');
        } else {
            $part = filter_input(INPUT_POST, 'part', FILTER_SANITIZE_SPECIAL_CHARS);
            BodyPart::create($part);
            $this->readAll();
        }
    }

    public function update()
    {
//case we are showing the edit form for a specific bodypart
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])){
                call('pages', 'error');
                return;
            }

            // we use the given id to get the correct product
            $bodyPart = BodyPart::find($_GET['id']);

            require_once('views/admin/bodyparts/update.php');
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $part = filter_input(INPUT_POST, 'part', FILTER_SANITIZE_SPECIAL_CHARS);

            BodyPart::update($id,$part);

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
            $bodyPart = BodyPart::find($_GET['id']);

            require_once('views/admin/bodyparts/delete.php');
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

           
            BodyPart::remove($id);

            $this->readAll();
        }
    }

}


