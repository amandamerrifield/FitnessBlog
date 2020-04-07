<!DOCTYPE html>
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
        <script src="jquery-3.4.1.min.js"></script>
  </head>
  <header>
      <?php require_once"header.php" ?>
  </header>
    <body style='background-color: #E8E8E8'>
        <div class='container-fluid' id='titleCont'>
    <!--This is the title of the page -->
    <div id='titleRow'>
        <div class="row">
            <div class='col-md-12'>
                <h2 class='titleText'>Exercise Made Easy</h2>
            </div>    
    </div>
    </div>
             <!--End of title -->
             
             <!-- sort function -->
<!--             <script src="../scripts/homeSort.js" type="text/javascript"></script>
             <nav class="navbar navbar-light justify-content-center mt-4">
    <form class="form-inline">
        <input class="form-control" id="myInput" type="text" placeholder="Search..">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> 
    </form>
</nav>-->
             <!--End of Sort Function -->
             
  <div class="card-deck" id="parent">
      <div class="row" id="blogRow">
  <div class="card col-xs-3 col-xs-6 col-xs-12">
    <img class="card-img-top" src="../images/AdobeStock_109806363_Preview.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Exercise<br></h5>
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
          Body Part<br>
          Difficulty<br>
      </p>
      <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
    </div>
  </div>
<div class="card col-xs-3 col-xs-6 col-xs-12">
    <img class="card-img-top" src="../images/AdobeStock_109806363_Preview.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Exercise<br></h5>
      <p class="card-text">
          Body Part<br>
          Difficulty<br>
      </p>
      <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
    </div>
  </div>
  <div class="card col-xs-3 col-xs-6 col-xs-12">
    <div class="card-body">
      <h5 class="card-title">Search the Exercises</h5>
      <p class="card-text"><script >
                        $(document).ready(function(){
                $("#myInput").on("keyup", function() {
                  var value = $(this).val().toLowerCase();
                  $("card-deck").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                  });
                });
                    });
          </script>
          <input class="form-control" id="myInput" type="text" placeholder="Search.."></p>
    </div>
  </div>
 </div>
</div>
            <!--The beginning of the blog posts grid -->
<!--    <div class="container-lg" id='parent'>
    <div id='blogRow'>
        <div class="row">
            <div class="col-xs-3 col-xs-6 col-xs-12"">
                <div class="posts" id='blogPosts' style="width: 15rem;height: 25rem;">
                    <img src="../images/AdobeStock_109806363_Preview.jpg" class="card-img-top" id='postImage' alt=""/>
                         <div class="card-body">
                         <h5 class="card-title">Running</h5>
                         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
                        </div>
                </div>
            </div>
            <div class="col-xs-3 col-xs-6 col-xs-12"">
                <div class="posts" id='blogPosts' style="width: 15rem;height: 30rem;">
                    <img src="../images/AdobeStock_244444342_Preview.jpg" class="card-img-top" id='postImage' alt=""/>
                    
                    <div class="card-body d-flex flex-column">
                         <h5 class="card-title">Squats</h5>
                         <p class="card-text">Exercise Name, difficulty level, body part.</p>
                         <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
                    </div>
                </div>
            </div>
                <div class="col-xs-3 col-xs-6 col-xs-12"">
                <div class="posts" id='blogPosts' style="width: 15rem;height: 25rem;">
                    
                    <img src="../images/spongebob2.jpeg" class="card-img-top" id='postImage' alt="..." >
                   
                         <div class="card-body d-flex flex-column">
                         <h5 class="card-title">Jumping Jacks</h5>
                         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
                        </div>
                    
                 </div>
                    </div>
                    <div class="col-xs-3 col-xs-6 col-xs-12 col-md-offset-3">
                        <div class="posts" id='blogPosts' style="width: 15rem;height: 25rem;">
                             <img src="../images/spongebob2.jpeg" class="card-img-top" id='postImage' alt="..." >
                   
                         <div class="card-body d-flex flex-column">
                         <h5 class="card-title">Jumping Jacks</h5>
                         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                         <a href="#" class="btn btn-primary" id='readMore'>Read More!</a> 
                    </div>
            </div>
            </div>
    </div>
</div> -->
           
    </body>
    
    <footer>
        <?php require_once"footer.php" ?>
    </footer>
