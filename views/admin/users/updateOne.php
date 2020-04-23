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
            <div class="form-label-group">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control"  name="password" value="<?php print $users->getPassword() ?>" required>
            </div>
            <!--            <div class="form-label-group">
                            <label for="inputConfirmPassword">Confirm Password</label>
                            <input type="password" id="inputConfirmPassword" class="form-control" name="password2" value="<?php print $users->getPassword() ?>" required>
                        </div>
            <?php
//            $passwordsnotequal = false;
//            if ($passwordsnotequal == true) {
//                print "You made a typo. Please enter again";
//            }
            ?>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Image</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>-->
            <button type="submit" class="btn btn-info">Save Updates</button>
        </form>
        <script>
            CKEDITOR.replace('user_content');
        </script>

    </div>
</div>  

