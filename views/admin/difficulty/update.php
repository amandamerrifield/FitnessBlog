
    <a href='?controller=difficulty&action=create' class="btn btn-info" id="adminBtn">Add Level</a>
    <a href='?controller=difficulty&action=readAll' class="btn btn-info" id="adminBtn">Manage Level</a>
    <div class="container"> 
        <div class="row h-25 d-inline-block"></div>
            <form action="index.php?controller=difficulty&action=update" method="POST">
                <div class="form-group">
                    <label for="DifficultyLevel">Difficulty Level</label>
                    <input type="hidden" class="form-control" id="DifficultyId" name="id" value="<?php print $difficulty->getId()?>">
                    <input type="text" class="form-control" id="DifficultyLevel" name="level" placeholder="Beginner" value="<?php print $difficulty->getLevel()?>">
                </div>
                <button type="submit" class="btn btn-outline-success">Save</button>
            </form>
    </div>
        