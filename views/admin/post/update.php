<div class="container">
    <a href="?controller=posts&action=create" class="btn btn-info" id="adminBtn">Add Post</a>
    <a href="?controller=posts&action=readAll" class="btn btn-info" id="adminBtn">Manage Post</a>
    <form style="margin-top: 20px;"  action="index.php?controller=posts&action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="post_id" name="id" value="<?php print $posts->getId() ?>">
        <div class="form-group">
            <label for="ExerciseName">Exercise Name</label>
            <input type="text" class="form-control" id="ExerciseName" name="ExerciseName" value="<?php print $posts->getExerciseName() ?>">
        </div>
        <div class="form-group">
            <label for="BodyPart">Body Part</label>
            <select class="form-control" id="BodyPart" name="BodyPart" value="<?php print $posts->getBodyPartId() ?>">
                <option value="1">Arms</option>
                <option value="2">Chest</option>
                <option value="3">Abs</option>
                <option value="4">Legs</option>
            </select>
        </div>
        <div class="form-group">
            <label for="ExperienceLevel">Experience Level</label>
            <select class="form-control" id="ExperienceLevel" name="ExperienceLevel" value="<?php print $posts->getDifficultyId() ?>">
                <option value="1">Beginner</option>
                <option value="2">Intermediate</option>
                <option value="3">Advanced</option>
            </select>
        </div>
        <div class="form-group">
            <label for="body">Exercise Description (1000 word max)</label>
            <textarea class="form-control" maxlength="1000" id="description" name="description" value="<?php print htmlspecialchars_decode($posts->getDescription(), ENT_QUOTES) ?>"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Exercise image file input</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="button" class="btn btn-outline-success">Save Updates</button> 
    </form>
    <script>
        CKEDITOR.replace('description');
    </script>
</div>
</div>  



