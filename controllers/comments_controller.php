<?php
require_once 'models/Comment.php';

class CommentsController
{
    public function readAll()
    {
        // we store all the posts in a variable
        $comments = Comment::all();
        require_once('views/Comments/readAll.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/Comments/create.php');
        } else {
            $blog_id = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
            Comment::create($blog_id, $content);
            $this->readAll();
        }
    }
}