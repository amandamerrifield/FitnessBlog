<a href='?controller=posts&action=create' class="btn btn-info" id="adminBtn">Add Post</a>
<a href='?controller=posts&action=update' class="btn btn-info" id="adminBtn">Manage Posts</a>
<div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Posts</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                <tr>
                    <th> ID</th>
                    <th> user id</th>
                    <th> exercise name</th>
                    <th> body part id</th>
                    <th> difficulty id</th>
                    <!--                  Get rid of this?-->
                    <th> description</th>
                    <!--                    <th>7 photo</th>-->
                    <th> Edit</th>
                    <th> Delete</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td> <?php print $post->getId() ?></td>
                        <td> <?php print $post->getUserId() ?></td>
                        <td> <?php print $post->getExerciseName() ?></td>
                        <td> <?php print $post->getBodyPartId() ?></td>
                        <td> <?php print $post->getDifficultyId() ?></td>
                        <td> <?php print $post->getDescription() ?></td>
                        <!--<td> <?php //print $blogPosts->getPhoto() ?></td>-->
                        <td>
                            <a href="index.php?controller=posts&action=update&id=<?php print $post->getId() ?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?controller=posts&action=delete&id=<?php print $post->getId() ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>