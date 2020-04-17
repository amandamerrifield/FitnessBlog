<?php
require_once 'models/Comment.php';

class CommentsController
{
    public function readAll() //we will need ones for a given blog
    {
        // we store all the posts in a variable
        $comments = Comment::all();
        require_once('views/Comments/readAll.php');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $blog_id = filter_input(INPUT_GET, 'blog_id', FILTER_SANITIZE_SPECIAL_CHARS);
            require_once('views/Comments/create.php');
        } else {
            $blog_id = filter_input(INPUT_POST, 'blog_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $posted_at=filter_input(INPUT_POST, 'blog_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
            Comment::create($blog_id,$posted_at, $content);
//            $this->readAll();
        }
    }
}