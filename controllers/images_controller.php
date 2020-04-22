<?php
require_once 'utilities.php';
require_once 'models/UploadedImage.php';
require_once 'libraries/fileupload/vendor/autoload.php';

class ImagesController
{
    public function upload() {
        $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_SPECIAL_CHARS);

        $factory = new FileUpload\FileUploadFactory(
            new FileUpload\PathResolver\Simple('/tmp'),
            new FileUpload\FileSystem\Simple(),
            [
                new FileUpload\Validator\MimeTypeValidator(['image/png', 'image/jpg']),
                new FileUpload\Validator\SizeValidator('2M')
            ]
        );

        $fileupload = $factory->create($_FILES['file'], $_SERVER);
        list($files, $headers) = $fileupload->processAll();

        // assume only one file uploaded
        if (count($files) == 0) {
            die('TODO: handle missing file');
        }

        if (count($files) > 1) {
            die('TODO: handle extra file');
        }

        $file = $files[0];

        // read image file into memory
        $file_path = $file->getRealPath();
        $file_type = $file->getMimeType();

        $handle = fopen($file_path, 'rb');
        $contents = fread($handle, filesize($file_path));
        fclose($handle);

        // store file into database
        UploadedImage::store($post_id, $contents, $file_type);
    }

    public function read() {
        $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_SPECIAL_CHARS);

        list ($photo, $photo_type) = UploadedImage::imageInPost($post_id);

        header("Content-Type: $photo_type");
        echo $photo;
    }

    public function delete() {
        $post_id = filter_input(INPUT_GET, 'post_id', FILTER_SANITIZE_SPECIAL_CHARS);
        UploadedImage::delete($post_id);
        redirect('posts', 'bigPost', ['id' => $post_id]);
    }
}
