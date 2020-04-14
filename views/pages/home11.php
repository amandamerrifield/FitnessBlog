    <html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link href="../css/homeBody.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrapresponsive.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href="../css/blogSearchStyle.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-3.4.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  
        
        <div class='container-fluid' id='titleCont'>
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
  <div class="card-deck" id="parent">
      <div class="row" id="blogRow">
  <div class="card col-xs-3 col-xs-6 col-xs-12">
    <img class="card-img-top" src="../images/AdobeStock_109806363_Preview.jpg" id='postImage'alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Cardio<br></h5>
      <p class="card-text">
          Body Part<br>
          Difficulty<br>
      </p>
      <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
    </div>
  </div>
      <div class="card col-xs-3 col-xs-6 col-xs-12">
    <img class="card-img-top" src="../images/AdobeStock_109806363_Preview.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Running<br></h5>
      <p class="card-text">
          Body Part: Legs<br>
          Level: Difficult<br>
      </p>
      <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
    </div>
  </div>
<div class="card col-xs-3 col-xs-6 col-xs-12">
    <img class="card-img-top" src="../images/AdobeStock_109806363_Preview.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Stretching<br></h5>
      <p class="card-text">
          Body Part: Chest<br>
          Level: Medium<br>
      </p>
      <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
    </div>
  </div>
 <div class="card col-xs-3 col-xs-6 col-xs-12">
    <img class="card-img-top" src="../images/AdobeStock_109806363_Preview.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Strength Training<br></h5>
      <p class="card-text">
          Body Part: Arms<br>
          Level: Easy<br>
      </p>
      <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
    </div>
</div>

 </div>
</div>
            