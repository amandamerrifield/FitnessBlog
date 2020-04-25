<div class="container" style="padding-top: 20px;" >
    <div class="row jumbotron">
        <div class="col-lg-8">
            <h1 id="pageTitle" class="mt-4"><?php print strtoupper($post->getExerciseName()) ?></h1>
            <hr>
            <p>Posted on <?php print $post->getCreatedAt() ?></p>
            <hr>
            <?php if ($post->hasPhoto()): ?>
                <img class="img-fluid rounded"
                     src="index.php?controller=images&action=read&post_id=<?php print $post->getId() ?>" alt="">
                     <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                    <form method="post" action="index.php?controller=images&action=delete&post_id=<?php print $post->getId() ?>">
                        <button type="submit">Delete Photo</button>
                    </form>
                <?php endif; ?>
                <hr>
            <?php else: ?>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
                    <form id="uploader"
                          action="index.php?controller=images&action=upload&post_id=<?php print $post->getId() ?>"
                          class="dropzone"></form>
                      <?php endif; ?>
                  <?php endif; ?>
            <p> <?php echo htmlspecialchars_decode($post->getDescription(), ENT_QUOTES) ?></p>
            <p>
                <a class="btn btn-info" data-toggle="collapse" href="#collapseExample" role="button"
                   aria-expanded="false" aria-controls="collapseExample">
                    Leave a comment
                </a>
            </p>
            <div class="collapse" id="collapseExample">
                <?php require_once 'views/Comments/create.php' ?>
            </div>    
            <?php foreach ($comments as $comment): ?>
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        <?php echo htmlspecialchars_decode($comment->getContent(), ENT_QUOTES) ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<script>
    Dropzone.options.uploader = {
        init: function () {
            this.on("success", function (file) {
                window.location.href = "index.php?controller=posts&action=bigPost&id=<?php print $post->getId() ?>";
            });
        }
    };
</script>
