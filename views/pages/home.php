
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
    <?php require_once "blogSearchFinal.php"?>

<div class="row row-cols-1 row-cols-md-3">
    <?php foreach ($posts as $blogPosts): ?>
  <div class="col mb-4">
    <div class="card h-100">
      <img src="<?php print $blogPosts->getPhoto() ?>" class="card-img-top" alt="Photo of the exercise ">
      <div class="card-body">
         <h5 id='h5' class="card-title"><?php print $blogPosts->getExerciseName() ?></h5>
        <p class="card-text"> Body part: <?php print $blogPosts->getBodyPartId() ?></p>
        <p class="card-text"> Level: <?php print $blogPosts->getDifficultyId() ?></p>
        <p class="card-text"> Description: <?php print $blogPosts->getDescription() ?></p>
      
        <a href="index.php?controller=posts&action=bigPost&id=<?php $blogPosts->getId()?>" class="btn btn-primary" id='readMore'>Read More!</a>
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