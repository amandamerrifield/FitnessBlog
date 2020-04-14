<?php
require "models/Posts.php";

class PostsController
{
    public function readAll()
    {
          // we store all the posts in a variable
        $posts = Posts::readAll();
        require_once('views/admin/post/readAll.php');
//        // we expect a url of form ?controller=posts&action=show&id=x
//        // without an id we just redirect to the error page as we need the post id to find it in the database
//         if (!isset($_GET['id'])) {
//            call('pages', 'error');
//            return;
//        }
//        
//        try {
//            // we use the given id to get the correct post
//            $posts = Posts::find($_GET['id']);
//            require_once('views/admin/post/readAll.php');
//        } catch (Exception $ex) {
//            call('pages', 'error');
//        }
    }

    public function create()
    {
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/admin/post/create.php');
        } else {
            $posts = filter_input(INPUT_POST, 'posts', FILTER_SANITIZE_SPECIAL_CHARS);
            Posts::create($posts);
            $this->readAll($id);
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
            $bodyPart = Posts::find($_GET['id']);

            require_once('views/admin/post/editPost.php');
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $posts = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_SPECIAL_CHARS);

            Posts::update($id,$posts);

            $this->readAll($id);
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
            $posts = Posts::find($_GET['id']);

            require_once('views/admin/post/delete.php');
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

            Posts::remove($id,$posts);

            $this->readAll($id);
        }
    }

}

