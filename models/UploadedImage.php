<?php
require_once 'connection.php';

class UploadedImage {

    public static function imageInPost($post_id) {
        $db = Db::getInstance();
        $req = $db->prepare("SELECT photo, photo_type FROM posts WHERE id = :id");
        $req->bindParam(':id', intval($post_id));
        $req->execute();
        $photo_row = $req->fetch();
        if (!$photo_row) {
            return null;
        }

        return [$photo_row['photo'], $photo_row['photo_type']];
    }

    public static function store($post_id, $content, $type) {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE posts SET photo = :photo, photo_type = :photo_type WHERE id=:id');
        $req->bindParam(':id', intval($post_id));
        $req->bindParam(':photo', $content);
        $req->bindParam(':photo_type', $type);
        $req->execute();
    }

    public static function delete($post_id) {
        $db = Db::getInstance();
        $req = $db->prepare('UPDATE posts SET photo = NULL, photo_type = NULL WHERE id=:id');
        $req->bindParam(':id', intval($post_id));
        $req->execute();
    }
}