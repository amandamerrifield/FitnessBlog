<div class="container">
    <a href="index.php?controller=users&action=create" class="btn btn-info" id="adminBtn">Add User</a>
    <a href="index.php?controller=users&action=readAll" class="btn btn-info" id="adminBtn">Manage User</a>
    <form style="margin-top: 20px;" action="index.php?controller=users&action=create" method="POST" enctype="multipart/form-data">
        <div class="form-label-group">
            <label for="inputFirstName">First Name</label>
            <input type="text" id="inputFirstName" class="form-control" name="first_name" required autofocus>
        </div>
        <div class="form-label-group">
            <label for="inputUsername">Username</label>
            <input type="text" id="inputUsername" class="form-control" name="username" required autofocus>
        </div>
        <div class="form-label-group">
            <label for="inputEmail">Email address</label>
            <input type="email" id="inputEmail" class="form-control" name="email" >
        </div>
        <div class="form-label-group">
            <label for="inputPassword">Password</label>
            <input type="password" id="inputPassword" class="form-control"  name="password" required>
        </div>
        <div class="form-label-group">
            <label for="inputConfirmPassword">Confirm Password</label>
            <input type="password" id="inputConfirmPassword" class="form-control" name="password2" required>
        </div>
        <?php
        $passwordsnotequal = false;
        if ($passwordsnotequal == true) {
            print "You made a typo. Please enter again";
        }
        ?>
        <div class="form-group">
            <label for="user">Is this user an admin?</label>
            <select class="form-control" id="admin" name="admin">
                <option value="0">Not Admin</option>
                <option value="1">Is an Admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="userContent">User Description (1000 word max)</label>
            <textarea class="form-control" name="user_content"></textarea>
        </div>
        <button type="submit" class="btn btn-info">Add User</button>
    </form>
    <script>
        CKEDITOR.replace('user_content');
    </script>
</div>  

