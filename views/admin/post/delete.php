<div class="container"> 
    <a href="index.php?controller=posts&action=create" class="btn btn-info" id="adminBtn">Add</a>
    <?php if ($_SESSION['is_admin'] == true) {    ?>
    <a href="index.php?controller=posts&action=readAll" class="btn btn-info" id="adminBtn">View all</a>
    <?php } else { ?>
    <a href="index.php?controller=posts&action=readForEditing" class="btn btn-info" id="adminBtn">View all</a>
    <?php } ?>
    <form action="index.php?controller=posts&action=delete" method="POST" style="margin-top: 20px;">
        <div class="form-group">
            <label for="BodyPartName">Are you sure you want to delete this post?</label>
            <input type="hidden" class="form-control" id="BodyPartId" name="id" value="<?php print $posts->getId() ?>">
            <input type="text" class="form-control" id="ExerciseName" name="exercise_name" value="<?php print $posts->getExerciseName() ?>">
        </div>
        <button type="submit" class="btn btn-outline-success">Delete</button>
    </form>
</div>