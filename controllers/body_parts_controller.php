<?php

//class BodyPartsController {
//
//    public function create() {
//        require_once('views/admin/bodyparts/createBodyPart.php');
//    }
//}


class BodyPartsController
{
    public function readAll()
    {
        // we store all the posts in a variable
        $products = BodyPart::all();
        require_once('views/admin/bodyparts/readAllBodyPart.php');
    }

    public function read()
    {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
            return call('pages', 'error');

        try {
            // we use the given id to get the correct post
            $product = BodyPart::find($_GET['id']);
            require_once('views/admin/bodyparts/indexBodyPart.php');
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
            require_once('views/admin/bodyparts/createBodyPart.php');
        } else {
            BodyPart::add();

            $products = BodyPart::all(); //$products is used within the view
            require_once('views/admin/bodyparts/readAllBodyPart.php');
        }

    }

    public function update()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id']))
                return call('pages', 'error');

            // we use the given id to get the correct product
            $product = BodyPart::find($_GET['id']);

            require_once('views/admin/bodyparts/editBodyPart.php');
        } else {
            $id = $_GET['id'];
            BodyPart::update($id);

            $products = BodyPart::all();
            require_once('views/admin/bodyparts/readAllBodyPart.php');
        }

    }

    public function delete()
    {
        BodyPart::remove($_GET['id']);

        $products = BodyPart::all();
        require_once('views/admin/bodyparts/readAllBodyPart.php');
    }

}


