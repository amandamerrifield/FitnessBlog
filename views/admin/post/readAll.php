<div class="container">
    <a href='?controller=posts&action=create' class="btn btn-info" id="adminBtn">Add Post</a>
    <?php if ($_SESSION['is_admin'] == true) { ?>
        <a href='?controller=posts&action=readAll' class="btn btn-info" id="adminBtn">Manage Posts</a>
    <?php } else { ?>
        <a href='?controller=posts&action=readForEditing' class="btn btn-info" id="adminBtn">Manage Posts</a>
    <?php } ?>
    <div class="card" style="margin-top: 20px;">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Posts</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered container-light table-striped text-center" id="table">
                <thead>
                    <tr>
                        <?php if ($_SESSION['is_admin'] == true) { ?>
                            <th> ID</th>
                            <th> user id</th>
                            <th> exercise name</th>
                            <th> body part id</th>
                            <th> difficulty id</th>
                            <th> description</th>
                            <th> Edit</th>
                            <th> Delete</th>
                        <?php } else { ?>
                            <th> exercise name</th>
                            <th> body part id</th>
                            <th> difficulty id</th>
                            <th> description</th>
                            <th> Edit</th>
                            <th> Delete</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody >
                    <?php foreach ($posts as $blogPosts): ?> 
                        <tr>
                            <?php if ($_SESSION['is_admin'] == true) { ?>
                                <td> <?php print $blogPosts->getId() ?></td>
                                <td> <?php print $blogPosts->getUserId() ?></td>
                                <td> <?php print $blogPosts->getExerciseName() ?></td>
                                <td> <?php print $blogPosts->getBodyPartId() ?></td>
                                <td> <?php print $blogPosts->getDifficultyId() ?></td>                            
                                <td> <?php echo htmlspecialchars_decode($blogPosts->getDescription(), ENT_QUOTES) ?></td>
                                <td>
                                    <a href="index.php?controller=posts&action=update&id=<?php print $blogPosts->getId() ?>">Edit</a>
                                </td>
                                <td>
                                    <a href="index.php?controller=posts&action=delete&id=<?php print $blogPosts->getId() ?>">Delete</a>
                                </td>
                            <?php } else { ?>
                                <td> <?php print $blogPosts->getExerciseName() ?></td>
                                <td> <?php print $blogPosts->getBodyPartId() ?></td>
                                <td> <?php print $blogPosts->getDifficultyId() ?></td>
                                <td> <?php echo htmlspecialchars_decode($blogPosts->getDescription(), ENT_QUOTES) ?></td>
                                <td>
                                    <a href="index.php?controller=posts&action=update&id=<?php print $blogPosts->getId() ?>">Edit</a>
                                </td>
                                <td>
                                    <a href="index.php?controller=posts&action=delete&id=<?php print $blogPosts->getId() ?>">Delete</a>
                                </td>
                            <?php } ?>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>