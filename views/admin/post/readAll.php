
<a href='?controller=posts&action=create' class="btn btn-info" id="adminBtn">Add Post</a>
                <a href='?controller=posts&action=editPosts' class="btn btn-info" id="adminBtn">Manage Posts</a>
<div class="container">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">All Posts</h3>
        <div class="card-body">
            <table class="table fixed_header table-bordered table-responsive-sm table-striped text-center">
                <thead>
                <tr>
                    <th>1 ID</th>
                    <th>2 user id</th>
                    <th>3 exercise name</th>
                    <th>4 body part id</th>
                    <th>5 difficulty id</th>
                    <!--                  Get rid of this?-->
                    <th>6 description</th>
<!--                    <th>7 photo</th>-->
                    <th> Edit</th>
                     <th> Delete</th>

                </tr>
                </thead>
                <tbody>
             <?php foreach ($posts as $blogPosts){ ?> 
                    <tr>
                        <td> 1<?php print $blogPosts->getId() ?></td>
                        <td> 2 <?php print $blogPosts->getUserId() ?></td>
                        <td> 3 <?php print $blogPosts->getExerciseName() ?></td>
                        <td> 4 <?php print $blogPosts->getBodyPartId()?></td>
                        <td> 5 <?php print $blogPosts->getDifficultyId()?></td>
                        <td> 6 <?php print $blogPosts->getDescription() ?></td>
                        <td> 7 <?php //print $blogPosts->getPhoto() ?></td>
                        <td>
                            <a href="index.php?controller=users&action=update&id=<?php //print $blogPosts->getId() ?>">Edit</a>
                        </td>
                        <td>
                            <a href="index.php?controller=users&action=delete&id=<?php //print $blogPosts->getId() ?>">Delete</a>
                        </td>
                    </tr>
             <?php } ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>