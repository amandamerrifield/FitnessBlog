<div class='container-fluid' id='titleCont' style="padding-bottom: 40px;">
    <!--This is the title of the page -->
    <div id='titleRow'>
        <div class="row">
            <div class='col-md-12'>
                <h2 class='titleText'>Exercise Made Easy</h2>
            </div>    
        </div>
    </div>
</div>
<div id="main">
    <a style="font-size:30px;cursor:pointer;color:blacl;" data-toggle="collapse" data-target="#filter" aria-controls="filter" aria-expanded="false" aria-label="Toggle filter">&#9776; Search the Blog </a>
</div>
<div class="collapse" id="filter" style="max-width: 200px">
    <label>Sort by area of focus:</label>
    <?php foreach ($bodyParts as $part): ?>
        <a href="index.php?controller=posts&action=findByBodyPart&id=<?php print $part->getId() ?>" class="btn btn-info">   <?php print $part->getPart() ?></a>
    <?php endforeach; ?>
    <label>Sort by level of difficulty:</label>
    <?php foreach ($difficulty as $level): ?>
        <a href="index.php?controller=posts&action=findByDifficulty&id=<?php print $level->getId() ?>" class="btn btn-info"> <?php print $level->getLevel() ?></a>
    <?php endforeach; ?>
</div>
<div class="row row-cols-1 row-cols-md-3">
    <?php foreach ($posts as $post): ?>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="<?php print $post->getPhoto() ?> " class="card-img-top" alt="Photo of the exercise ">
                <div class="card-body">
                    <h5 id='h5' class="card-title"><?php print $post->getExerciseName() ?></h5>
                    <p class="card-text"> Body part: <?php print $post->getBodyPartId() ?></p>
                    <p class="card-text"> Level: <?php print $post->getDifficultyId() ?></p>
                    <p class="card-text"> Description: <?php print $post->getDescription() ?></p>
                    <a href="index.php?controller=posts&action=bigPost&id=<?php print $post->getId() ?>" class="btn btn-primary" id='readMore'>Read More!</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>




<style>
    p {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 75ch;
    }
</style>