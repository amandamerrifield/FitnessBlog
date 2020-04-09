<a href="index.php?controller=body_parts&action=create" class="btn btn-info" id="adminBtn">Add</a>
<a href="index.php?controller=body_parts&action=readAll" class="btn btn-info" id="adminBtn">View all</a>
<div class="container">
    <div class="row h-25 d-inline-block"></div>
    <form action="index.php?controller=body_parts&action=update" method="POST">
        <div class="form-group">
            <label for="BodyPartName">Body Part Name</label>
            <input type="hidden" class="form-control" id="BodyPartId" name="id" value="<?php print $bodyPart->getId()?>">
            <input type="text" class="form-control" id="BodyPartName" name="part" value="<?php print $bodyPart->getPart()?>">
        </div>
        <button type="submit" class="btn btn-outline-success">Save</button>
    </form>
