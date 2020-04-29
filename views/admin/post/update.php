<div class="container">
    <a href='?controller=posts&action=create' class="btn btn-info" id="adminBtn">Add Post</a>
    <?php if ($_SESSION['is_admin'] == true) {    ?>
    <a href='?controller=posts&action=readAll' class="btn btn-info" id="adminBtn">Manage Posts</a>
    <?php } else { ?>
         <a href='?controller=posts&action=readForEditing' class="btn btn-info" id="adminBtn">Manage Posts</a>
    <?php } ?>
    <form style="margin-top: 20px;"  action="index.php?controller=posts&action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="post_id" name="id" value="<?php print $posts->getId() ?>">
        <div class="form-group">
            <label for="ExerciseName">Exercise Name</label>
            <input type="text" class="form-control" id="ExerciseName" name="exercise_name" value="<?php print $posts->getExerciseName() ?>" required>
        </div>
        <div class="form-group">
            <label for="body">Exercise Description (1000 word max)</label>
            <textarea class="form-control" maxlength="1000" id="description" name="description"><?php print htmlspecialchars_decode($posts->getDescription(), ENT_QUOTES) ?></textarea>
        </div>
        <button type="submit" class="btn btn-outline-success">Save Updates</button> 
    </form>
</div>
</div>  



