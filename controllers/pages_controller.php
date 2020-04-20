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

    public function bmi()
    {
        show_view('views/pages/bmi.php');
    }

}
