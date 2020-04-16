            <div class="col-md-9" >
                <a href="/views/admin/post/create.php" class="btn btn-info" id="adminBtn">Add Post</a>
                <a href="/views/admin/post/readAll.php" class="btn btn-info" id="adminBtn">Manage Post</a>


                <div class="container"> 
                   
                    <div class="row h-25 d-inline-block"></div>
                        <form action="index.php?controller=posts&action=create" method="POST" enctype="multipart/form-data">
                                <input value =" <?php echo $_SESSION['id']; ?>" type="hidden" class="form-control" id="userId" name="user_id">

                            <div class="form-group">
                                <label for="ExerciseName">Exercise Name</label>
                                <input type="text" class="form-control" id="ExerciseName" name="exercise_name" placeholder="Push Up">
                            </div>
                            <div class="form-group" >
                                <label for="BodyPart">Body Part</label>
                                    
                                <select  class="form-control" id="BodyPart" name="body_part_id">
                                    <?php foreach ($bodyParts as $part): ?> 
                                    <option href="index.php?controller=body_parts&action=readAll2"><?php print $part->getPart() ?></option>
<!--                                   <option value="2">Chest</option>
                                    <option value="3">Abs</option>
                                    <option value="4">Legs</option>-->
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ExperienceLevel">Experience Level</label>
                                <select class="form-control" id="ExperienceLevel" name="difficulty_id">
                                    <option value="1">Beginner</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Advanced</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="body">Exercise Description (1000 word max)</label>
                                <textarea class="form-control" maxlength="1000" id="body" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Image</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                             <button type="submit" class="btn btn-info">Add Post</button>
                        </form>
                       

                </div>
            </div>  
        </div>     
    </body>
</html>

