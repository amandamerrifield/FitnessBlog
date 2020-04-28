<?php
require_once "models/Posts.php";
require_once "models/BodyPart.php";
require_once "models/Difficulty.php";
require_once "models/Comment.php";
require_once "models/Users.php";
require_once 'utilities.php';

class PostsController
{
    public function readAll()
    {
        show_view('views/admin/post/readAll.php', ['posts' => Posts::readAll()]);
    }
    
    
    
    public function create()
    {
        // we expect a url of form ?controller=products&action=create
        // if it's a GET request display a blank form for creating a new product
        // else it's a POST so add to the database and redirect to readAll action
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            show_view('views/admin/post/create.php', [
                'bodyParts' => BodyPart::all(),
                'difficulty' => Difficulty::all()
            ]);
        } else {
            //$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $exercise_name = filter_input(INPUT_POST, 'exercise_name', FILTER_SANITIZE_SPECIAL_CHARS);
            $body_part_id = filter_input(INPUT_POST, 'body_part_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $difficulty_id = filter_input(INPUT_POST, 'difficulty_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            $created_at = filter_input(INPUT_POST, 'created_at', FILTER_SANITIZE_SPECIAL_CHARS);
            Posts::create($user_id, $exercise_name, $body_part_id, $difficulty_id, $description, $created_at);
            
            
            //if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if ($_SESSION['is_admin'] == 1){
                 redirect('posts', 'readAll');
             } else {
                 redirect('pages', 'home');
             }
            
            
        //}
        }
    }

    public function update()
    {
//case we are showing the edit form for a specific bodypart
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])) {
                redirect('pages', 'error');
                return;
            }
            show_view('views/admin/post/update.php', ['posts' => Posts::find($_GET['id'])]);
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            $exercise_name = filter_input(INPUT_POST, 'exercise_name', FILTER_SANITIZE_SPECIAL_CHARS);
//            $bodyPartId = filter_input(INPUT_POST, 'body_part_id', FILTER_SANITIZE_SPECIAL_CHARS);
//            $difficultyId = filter_input(INPUT_POST, 'difficulty_id', FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
            
            Posts::update($id, $exercise_name, $description);
            redirect('posts', 'readAll');
        }

    }

    public function delete()
    {
//case we are showing the edit form for a specific bodypart
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset($_GET['id'])) {
                call('pages', 'error');
                return;
            }
            // we use the given id to get the correct product
            show_view('views/admin/post/delete.php', ['posts' => Posts::find($_GET['id'])]);
        } else { //case when we are writing the bodypart to the database
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
            Posts::remove($id);
            redirect('posts', 'readAll');
        }
    }

    public function bigPost()
    {
        $post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $post = Posts::find($post_id);

        show_view('views/admin/post/bigPost.php', [
            'post' => Posts::find($post_id),
            'comments' => Comment::all($post_id),
            'user' => Users::find($post->getUserId()),
            'hide_header' => true
        ]);
    }
//        public function bigPost1111()
//    {    if (!empty($blog_id)){
//            $post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//            $blog_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//            show_view('views/admin/post/bigPost.php', [
//                'post' => Posts::find($post_id),
//                'comments' => Comment::all($blog_id),
//                'hide_header' => true
//        ]);
//        } else {
//            $post_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//            show_view('views/admin/post/bigPost.php', [
//                'post' => Posts::find($post_id),
//                'hide_header' => true
//            ]);
//
//        }
//        
//        
//    }

    public function findByBodyPart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            show_view('views/pages/home.php', [
                'bodyParts' => BodyPart::all(),
                'difficulty' => Difficulty::all(),
                'posts' => Posts::findByBodyPart($_GET['id']),
            ]);
        }
    }

    public function findByDifficulty()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            show_view('views/pages/home.php', [
                'bodyParts' => BodyPart::all(),
                'difficulty' => Difficulty::all(),
                'posts' => Posts::findByDifficulty($_GET['id']),
            ]);
        }
    }
}

