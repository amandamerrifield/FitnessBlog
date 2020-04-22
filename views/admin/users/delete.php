<div class="container"> 
    <a href="index.php?controller=users&action=create" class="btn btn-info" id="adminBtn">Add</a>
    <a href="index.php?controller=users&action=readAll" class="btn btn-info" id="adminBtn">View all</a>
    <form action="index.php?controller=users&action=delete" method="POST" style="margin-top: 20px;">
        <div class="form-group">
            <label for="BodyPartName">Are you sure you want to delete this user?</label>
            <input type="text" id="Username" class="form-control" name="first_name" value="<?php print $users->getFirstName() ?>"  >
        </div>
        <button type="submit" class="btn btn-outline-success">Delete</button>
    </form>
</div>