<a href='?controller=difficulty&action=create' class="btn btn-info" id="adminBtn">Add Level</a>
<a href='?controller=difficulty&action=readAll' class="btn btn-info" id="adminBtn">Manage Level</a>
    <div class="container"> 
        <div class="row h-25 d-inline-block"></div>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="DifficultyLevel">Difficulty Level</label>
                <input type="text" class="form-control" id="DifficultyLevel" name="level" placeholder="Beginner">
            </div>
            <button type="submit" class="btn btn-info">Add Level</button>
        </form>
