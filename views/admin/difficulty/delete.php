<div class="row h-25 d-inline-block"></div>
<form action="index.php?controller=difficulty&action=delete" method="POST">
    <div class="form-group">
        <label for="DifficultyLevel">Are you sure you want to delete</label>
        <input type="hidden" class="form-control" id="DifficultyId" name="id" value="<?php print $difficulty->getId() ?>">
        <input type="text" class="form-control" id="DifficultyLevel" name="level" value="<?php print $difficulty->getLevel() ?>">
    </div>
    <button type="submit" class="btn btn-outline-success">Delete</button>
</form>