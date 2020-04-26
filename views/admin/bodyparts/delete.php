<div class="container"> 
    <a href="index.php?controller=body_parts&action=create" class="btn btn-info" id="adminBtn">Add</a>
    <a href="index.php?controller=body_parts&action=readAll" class="btn btn-info" id="adminBtn">View all</a>
    <form action="index.php?controller=body_parts&action=delete" method="POST" style="margin-top: 20px;">
        <div class="form-group">
            <label for="BodyPartName">Are you sure you want to delete this body part?</label>
            <input type="hidden" class="form-control" id="BodyPartId" name="id" value="<?php print $bodyPart->getId() ?>">
            
            <input type="text" class="form-control" id="BodyPartName" name="part" value="<?php print $bodyPart->getPart() ?>">
        </div>
        <button type="submit" class="btn btn-outline-success">Delete</button>
    </form>
</div>