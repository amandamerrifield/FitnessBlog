<?php
require_once 'models/Posts.php';
require_once "models/BodyPart.php";
require_once "models/Difficulty.php";
require_once 'utilities.php';

class PagesController
{
    public function error()
    {
        show_view('views/pages/error.php');
    }

    public function home()
    {
        // we store all the posts in a variable
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset ($_GET['id'])) {
                show_view('views/pages/home.php', [
                    'posts' => Posts::readAll(),
                    'bodyParts' => BodyPart::all(),
                    'difficulty' => Difficulty::all(),
                ]);
            } else {
                show_view('views/pages/home.php', [
                    'posts' => Posts::findByBodyPart($_GET['id']),
                    'bodyParts' => BodyPart::all(),
                    'difficulty' => Difficulty::all(),
                ]);
            }
        }
    }

    public function home2()
    {
        // we store all the posts in a variable
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (!isset ($_GET['id'])) {
                show_view('views/pages/home.php', [
                    'posts' => Posts::readAll(),
                    'bodyParts' => BodyPart::all(),
                    'difficulty' => Difficulty::all(),
                ]);
            } else {
                show_view('views/pages/home.php', [
                    'posts' => Posts::findByDifficulty($_GET['id']),
                    'bodyParts' => BodyPart::all(),
                    'difficulty' => Difficulty::all(),
                ]);
            }
        }
    }
//    public function home() {
//        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//            if (!isset($_GET['id'])) {
//                $posts = Posts::readAll();
//                $bodyParts = BodyPart::all();
//                $difficulty = Difficulty::all();
//
//                require_once('views/pages/home.php');
//            } else {
//                if (!null==(findByBodyPart($_GET['id']))) {
//
//                    $bodyParts = BodyPart::all();
//                    $difficulty = Difficulty::all();
//                    $posts = Posts::findByBodyPart($_GET['id']);
//                    require_once('views/pages/home.php');
//                } else {
//                    $bodyParts = BodyPart::all();
//                    $difficulty = Difficulty::all();
//                    $posts = Posts::findByDifficulty($_GET['id']);
//                    require_once('views/pages/home.php');
//                }
//            }
//        }
//
//    }

//        // we expect a url of form ?controller=posts&action=show&id=x
//        // without an id we just redirect to the error page as we need the post id to find it in the database
//         

}
