<div class="dropdown-content">
    <?php foreach ($bodyParts as $part) :?>

        <select class="form-control" id="body_part_id" name="body_part_id">
            <option value="<?php print $part->getId() ?>"><?php print $part->getPart() ?></option>
        </select>

    <?php endforeach; ?>
</div>
