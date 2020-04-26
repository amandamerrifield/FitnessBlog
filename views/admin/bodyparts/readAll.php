<div class="container">
    <a href="index.php?controller=body_parts&action=create" class="btn btn-info" id="adminBtn">Add</a>
    <a href="index.php?controller=body_parts&action=readAll" class="btn btn-info" id="adminBtn">View all</a>
    <div class="card" style="margin-top: 20px;">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Body Part</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered container-light table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Part</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bodyParts as $part) { ?>
                        <tr>
                            <td><?php print $part->getId() ?></td>
                            <td><?php print $part->getPart() ?></td>
                            <td id="edit">
                                <a href="index.php?controller=body_parts&action=update&id=<?php print $part->getId() ?>">Edit</a>
                            </td>
                            <td>
                                <a href="index.php?controller=body_parts&action=delete&id=<?php print $part->getId() ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>