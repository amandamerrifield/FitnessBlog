<div class="container"> 
    <a href="index.php?controller=users&action=create" class="btn btn-info" id="adminBtn">Add User</a>
    <a href="index.php?controller=users&action=readAll" class="btn btn-info" id="adminBtn">Manage User</a>
    <form style="margin-top: 20px;" action="index.php?controller=users&action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" class="form-control" id="user_id" name="id" value="<?php print $users->getId() ?>">
        <div class="form-label-group">
            <label for="inputFirstName">First Name</label>
            <input type="text" id="inputUsername" class="form-control" name="first_name" value="<?php print $users->getFirstName() ?>" required autofocus>
        </div>
        <div class="form-label-group">
            <label for="inputUsername">Username</label>
            <input type="text" id="inputUsername" class="form-control" name="username" value="<?php print $users->getUsername() ?>" required>
        </div>
        <div class="form-label-group">
            <label for="inputEmail">Email address</label>
            <input type="email" id="inputEmail" class="form-control" name="email" value="<?php print $users->getEmail() ?>" >
        </div>
        <div class="form-label-group">
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" class="form-control"  name="password" value="<?php print $users->getPassword() ?>" required>
        </div>
        <div class="form-label-group">
            <label for="inputConfirmPassword">Confirm Password</label>
            <input type="password" id="inputConfirmPassword" class="form-control" name="password2" value="<?php print $users->getPassword() ?>" required>
        </div>
        <?php
        $passwordsnotequal = false;
        if ($passwordsnotequal == true) {
            print "You made a typo. Please enter again";
        }
        ?>
        <div class="form-group">
            <label for="user">Is this user an admin?</label>
            <select class="form-control" id="admin" name="admin" value="<?php print $users->getAdmin() ?>">
                <option value="0">Not Admin</option>
                <option value="1">Is an Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="userContent">User Description (1000 word max)</label>
            <textarea class="form-control" maxlength="1000" id="userContent" name="user_content" value="<?php print $users->getUserContent() ?>"></textarea>
        </div>
        <button type="submit" class="btn btn-info">Save Updates</button>
    </form>
</div>  