            <div class="col-md-9" >
                <a href="createPost.php" class="btn btn-info" id="adminBtn">Add Post</a>
                <a href="indexPost.php" class="btn btn-info" id="adminBtn">Manage Post</a>


                <div class="container"> 
                    <div class="row h-25 d-inline-block"></div>
                        <form>
                            <div class="form-group">
                                <label for="ExerciseName">Exercise Name</label>
                                <input type="text" class="form-control" id="ExerciseName" name="ExerciseName" placeholder="Push Up">
                            </div>
                            <div class="form-group">
                                <label for="BodyPart">Body Part</label>
                                <select class="form-control" id="BodyPart" name="BodyPart">
                                    <option value="1">Arms</option>
                                    <option value="2">Chest</option>
                                    <option value="3">Abs</option>
                                    <option value="4">Legs</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ExperienceLevel">Experience Level</label>
                                <select class="form-control" id="ExperienceLevel" name="ExperienceLevel">
                                    <option value="1">Biginner</option>
                                    <option value="2">Intermediate</option>
                                    <option value="3">Advanced</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="body">Exercise Discription (1000 word max)</label>
                                <textarea class="form-control" maxlength="1000" id="body" name="ExerciseDiscription"></textarea>
                            </div>
                        </form>
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Exercise image file input</label>
                                <input type="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                        <button type="button" class="btn btn-outline-success">Add Post</button>
                </div>
            </div>  
        </div>     
    </body>
</html>

