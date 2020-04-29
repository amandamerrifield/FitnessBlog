<div class="col-md-9" >
    <a href="index.php?controller=users&action=readOne" class="btn btn-info" id="adminBtn">View your details</a>
    <div class="container" style="margin-top: 20px;"> 
        <form action="index.php?controller=users&action=updateOne" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" id="user_id" name="id" value="<?php print $users->getId() ?>">
            <div class="form-label-group">
                <label for="inputFirstName">First Name</label>
                <input type="text" id="inputUsername" class="form-control" name="first_name" value="<?php print $users->getFirstName() ?>" required autofocus>
            </div>
            <div class="form-label-group">
                <label for="inputUsername">Username</label>
                <input type="text" id="inputUsername" class="form-control" name="username" value="<?php print $users->getUsername() ?>" required autofocus>
            </div>
            <div class="form-label-group">
                <label for="inputEmail">Email address</label>
                <input type="email" id="inputEmail" class="form-control" name="email" value="<?php print $users->getEmail() ?>" >
            </div>
            <button type="submit" class="btn btn-info">Save Updates</button>
        </form>
    </div>
</div>  

