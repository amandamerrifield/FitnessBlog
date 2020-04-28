<h2 id="pageTitle">Exercise Made Easy</h2>
<div id="main">
    <a style="font-size:30px;cursor:pointer;color:black;" data-toggle="collapse" data-target="#filter"
       aria-controls="filter" aria-expanded="false" aria-label="Toggle filter">&#9776; Search the Blog </a>
</div>
<div class="collapse" id="filter" style="max-width: 400px">
    <div style="margin-bottom:20px;">
        <label>Sort by area of focus:</label><br>
        <?php foreach ($bodyParts as $part): ?>
            <a href="index.php?controller=posts&action=findByBodyPart&id=<?php print $part->getId() ?>"
               class="btn btn-info"><?php print $part->getPart() ?></a>
           <?php endforeach; ?>
    </div>
    <div style="margin-bottom:20px;">
        <label>Sort by level of difficulty:</label><br>
        <?php foreach ($difficulty as $level): ?>
            <a href="index.php?controller=posts&action=findByDifficulty&id=<?php print $level->getId() ?>"
               class="btn btn-info"> <?php print $level->getLevel() ?></a>
           <?php endforeach; ?>
    </div>
</div>
<div class="row row-cols-1 row-cols-md-3">
    <?php foreach ($posts as $post): ?>
        <div class="col mb-4">
            <div class="card h-100">
                <?php if ($post->hasPhoto()): ?>
                    <img src="index.php?controller=images&action=read&post_id=<?php print $post->getId() ?>"
                         class="card-img-top" alt="Photo of the exercise">
                     <?php endif; ?>
                <div class="card-body">
                    <h5 id='h5' class="card-title"><?php print $post->getExerciseName() ?></h5>
                    <p class="card-text"> Body part: <?php print $post->getBodyPartId() ?></p>
                    <p class="card-text"> Level: <?php print $post->getDifficultyId() ?></p>
                    <p class="card-text"> Author: <?php print $post->getFirstName() ?></p>

                    <p id='p' class="card-text">
                        Description: <?php echo htmlspecialchars_decode($post->getDescription(), ENT_QUOTES) ?></p>
                    <a href="index.php?controller=posts&action=bigPost&id=<?php print $post->getId() ?>"
                       class="btn btn-info" id='readMore'>Read More!</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>


<style>
    #p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 75ch;
    }

    h5 {
        background-color: pink;
        padding: 10%;
    }
</style>