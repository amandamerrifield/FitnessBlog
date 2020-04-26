 <div class="container"> 
    <a href='?controller=difficulty&action=create' class="btn btn-info" id="adminBtn">Add Level</a>
    <a href='?controller=difficulty&action=readAll' class="btn btn-info" id="adminBtn">Manage Level</a>
    <div class="card"  style="margin-top: 20px;">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Manage Difficulty Level</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered container-light table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Level</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($difficulty as $level) : ?>   
                        <tr>
                            <td><?php print $level->getId() ?></td>
                            <td><?php print $level->getLevel() ?></td>
                            <td>
                                <a href="index.php?controller=difficulty&action=update&id=<?php print $level->getId() ?>">Edit</a>
                            </td>
                            <td>
                                <a href="index.php?controller=difficulty&action=delete&id=<?php print $level->getId() ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table> 
        </div> 
    </div>
</div>
