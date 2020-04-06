<?php require 'header.php'; ?>
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
            <option value="1">Beginner</option>
            <option value="2">Intermediate</option>
            <option value="3">Advanced</option>
        </select>
    </div>
    <div class="form-group">
        <label for="ExerciseDiscription">Exercise Description (1000 word max)</label>
        <textarea class="form-control" maxlength="1000" id="ExerciseDiscription" name="ExerciseDiscription" rows="3"></textarea>
    </div>
</form>
<form>
    <div class="form-group">
        <label for="exampleFormControlFile1">Exercise image file input</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
</form>
<button type="button" class="btn btn-outline-success">Post</button>
<?php require 'footer.php'; ?>