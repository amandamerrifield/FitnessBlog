<div class="container">
    <a href='?controller=posts&action=create' class="btn btn-info" id="adminBtn">Add Post</a>
    <a href='?controller=posts&action=readAll' class="btn btn-info" id="adminBtn">Manage Posts</a>
    <div class="card" style="margin-top: 20px;">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Posts</h3>
        <div class="card-body">
            <table class="table table-fixed fixed_header table-bordered table-responsive-lg table-striped text-center" id="table">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> user id</th>
                        <th> exercise name</th>
                        <th> body part id</th>
                        <th> difficulty id</th>
                        <th> description</th>
    <!--                    <th>7 photo</th>-->
                        <th> Edit</th>
                        <th> Delete</th>
                    </tr>
                </thead>
                <tbody >
                    <?php foreach ($posts as $blogPosts): ?> 
                        <tr>
                            <td> <?php print $blogPosts->getId() ?></td>
                            <td> <?php print $blogPosts->getUserId() ?></td>
                            <td> <?php print $blogPosts->getExerciseName() ?></td>
                            <td> <?php print $blogPosts->getBodyPartId() ?></td>
                            <td> <?php print $blogPosts->getDifficultyId() ?></td>                            
                            <td> <?php echo htmlspecialchars_decode($blogPosts->getDescription(), ENT_QUOTES) ?></td>
                            <!--<td> <?php //print $blogPosts->getPhoto()    ?></td>-->
                            <td>
                                <a href="index.php?controller=posts&action=update&id=<?php print $blogPosts->getId() ?>">Edit</a>
                            </td>
                            <td>
                                <a href="index.php?controller=posts&action=delete&id=<?php print $blogPosts->getId() ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>