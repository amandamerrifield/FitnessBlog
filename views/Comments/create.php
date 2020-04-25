<?php //date_default_timezone_set('Europe/London');?>
<form method="POST" action="index.php?controller=comments&action=create">
    <div class="form-group">
        <input type="hidden" name="blog_id" value="<?php print $post->getId()?>">
        <input type="hidden" name="posted_at" value="<?php print date('Y-m-d h:g:s')?>">
        <textarea class="card-body" name="content" required  placeholder="Enter your comment here"></textarea>
        <script>
            CKEDITOR.replace('content');
        </script>
            
    </div>
    <button class="btn btn-info" name = "commentSubmit" type="submit">Comment</button>
</form>