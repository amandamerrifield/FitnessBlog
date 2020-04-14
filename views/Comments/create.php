<?php //date_default_timezone_set('Europe/London');?>
<form class="container" method="POST" action="index.php?controller=comments&action=create">
    <div class="form-group">
        <input type="hidden" name="blog_id" value="<?php print $content->getBlogId?>">
        <textarea name="content" required  placeholder="Enter your comment here"></textarea>
    </div>
    <button name = "commentSubmit" type="submit">Comment</button>
</form>