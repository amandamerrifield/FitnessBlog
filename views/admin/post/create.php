<div class="container"> 
    <?php
    if (!isset($_SESSION["username"])) {
        
    } else if ($_SESSION['is_admin'] == true) {
        ?>
        <a href="?controller=posts&action=create" class="btn btn-info" id="adminBtn">Add Post</a>
        <a href="?controller=posts&action=readAll" class="btn btn-info" id="adminBtn">Manage Post</a>
        <?php
    } else {
        ?>  
        <h1> Create a Post</h1>
    <?php } ?>
    <form  style="margin-top: 20px;" action="index.php?controller=posts&action=create" method="POST" enctype="multipart/form-data">
        <input value =" <?php echo $_SESSION['id']; ?>" type="hidden" class="form-control" id="userId" name="user_id">
        <div class="form-group">
            <label for="ExerciseName">Exercise Name</label>
            <input type="text" class="form-control" id="ExerciseName" name="exercise_name" placeholder="e.g.Push Up">
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
            <label for="body">Exercise Description (1000 word max)</label>
            <textarea class="form-control" maxlength="1000" id="body" name="description"></textarea>
<!--            <script>
                CKEDITOR.replace('description');
            </script>-->
        </div>
        <button type="submit" class="btn btn-info">Add Post</button>
    </form>

</div>
 



