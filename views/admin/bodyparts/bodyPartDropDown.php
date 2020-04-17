<div class="dropdown-content">
    <?php foreach ($bodyParts as $part) { ?>

        <select class="form-control" id="bodyPart" name="body_part_id">
            <option value="<?php print $part->getId() ?>"><?php print $part->getPart() ?></option>
        </select>

    <?php } ?>
</div>
<!--<div id="myDropdown" class="">
                                  <a href="#">Link 1</a>
                                  <a href="#">Link 2</a>
                                  <a href="#">Link 3</a>
                                </div>-->