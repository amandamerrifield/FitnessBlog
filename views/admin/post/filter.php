<div id="mySidenav" style="margin-left: 20px;" >
    <div>
        <h5>Sort by level of difficulty:</h5>
    </div>
    <select class="form-control" id="ExperienceLevel" name="difficulty_id">
        <?php foreach ($difficulty as $level): ?>
            <option value="<?php print $level->getId() ?>"><?php print $level->getLevel() ?></option>
        <?php endforeach; ?>
    </select>
    <div>
        <h5>Sort by area of focus:</h5>
    </div>
    <select class="form-control" id="BodyPart" name="body_part_id">
        <?php foreach ($bodyParts as $part): ?>
            <option value="<?php print $part->getId() ?>"><?php print $part->getPart() ?></option>
        <?php endforeach; ?>

    </select>
</div>
<div id="main">
    <span style="font-size:30px;cursor:pointer;color:blacl;" onclick="openNav()">&#9776; Search the Blog </span>
</div>

