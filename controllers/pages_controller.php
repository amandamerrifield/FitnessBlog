<?php
require"models/Posts.php";
class PagesController {

    //public function home() {
    //    require_once('views/pages/home.php');
    //}

    public function error() {
        require_once('views/pages/error.php');
    }
    public function home()
    {
          // we store all the posts in a variable
        $posts = Posts::readAll();
        require_once('views/pages/home.php');
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
//  
      }
}
