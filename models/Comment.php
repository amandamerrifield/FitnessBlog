<?php
class Comment
{
    protected $id;
    protected $blog_id;
    protected $posted_at;
    protected $content;

    public function __construct($id, $blog_id, $posted_at, $content)
    {
        $this->id = $id;
        $this->blog_id = $blog_id;
        $this->posted_at = $posted_at;
        $this->content = $content;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBlogId()
    {
        return $this->blog_id;
    }

    public function getPostedAt()
    {
        return $this->posted_at;
    }

    public function getContent()
    {
        return $this->content;
    }

    public static function create($blog_id,$posted_at,$content)
    {
        $db = Db::getInstance();
        $req = $db->prepare("Insert into comments(blog_id, posted_at, content) 
        values (:blog_id, NOW(), :content)");
        $req->bindParam(':blog_id',$blog_id);
        $req->bindParam(':content',$content);
        $req->execute();
    }

    public static function all()
    {
        $db = Db::getInstance();
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM comments WHERE id = :id');
        $req->execute(array('id' => $id));
        $comments = $req->fetch();
        if ($comments) {
            return new Comments($comments['id'], $comments['blog_id'], $comments['posted_at'], $comments['content']);
        } else {
            throw new Exception('This comment is not available');
        }
    }
}