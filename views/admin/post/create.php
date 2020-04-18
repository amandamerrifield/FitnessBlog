
<div class="col-md-9" >
    <a href="?controller=posts&action=create" class="btn btn-info" id="adminBtn">Add Post</a>
    <a href="?controller=posts&action=readAll" class="btn btn-info" id="adminBtn">Manage Post</a>


    <div class="container"> 

        <div class="row h-25 d-inline-block"></div>
        <form action="index.php?controller=posts&action=create" method="POST" enctype="multipart/form-data">
            <input value =" <?php echo $_SESSION['id']; ?>" type="hidden" class="form-control" id="userId" name="user_id">

            <div class="form-group">
                <label for="ExerciseName">Exercise Name</label>
                <input type="text" class="form-control" id="ExerciseName" name="exercise_name" placeholder="Push Up">
            </div>
            <div class="form-group">
                <label for="BodyPart">Body Part</label>

                <select class="form-control" id="BodyPart" name="body_part_id">
                    <?php foreach ($bodyParts as $part): ?>
                        <option value="<?php print $part->getId() ?>"><?php print $part->getPart() ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <div class="form-group">
                <label for="ExperienceLevel">Experience Level</label>
                <select class="form-control" id="ExperienceLevel" name="difficulty_id">
                    <?php foreach ($difficulty as $level): ?>
                        <option value="<?php print $level->getId() ?>"><?php print $level->getLevel() ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="body">Exercise Description</label>
                <textarea class="form-control" maxlength="1000" id="body" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <button type="submit" class="btn btn-info">Add Post</button>
        </form>
        <script>
            CKEDITOR.replace('description');
        </script>
    </div>
</div>  



