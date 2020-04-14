<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="views/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="views/css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <div class="col-md-3" id="logo">
                    <a class="navbar-brand js-scroll-trigger" style="margin-left: 15%;" href="index.php?controller=pages&action=home"><img src="views/images/logo.png" alt="logo"/></a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php 
                    if (!isset($_SESSION["username"])) {
                    ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?controller=pages&action=home">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=users&action=aboutUs">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=users&action=create">
                                    Sign Up
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=login&action=validateLogin">Login</a>
                            </li>
                        </ul>
                    <?php 
                        } else {
                    ?>
                        <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=users&action=readAll">About</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
                                </svg> 
                                <?php echo $_SESSION['username']; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="index.php?controller=pages&action=home">Dashboard</a>
                              <a class="dropdown-item" href="index.php?controller=login&action=logout">Logout</a>
                            </div>
                            </li>
                        </ul>
                    <?php 
                        } 
                    ?>
                </div>
            </div>
        </nav>
       
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="views/images/banner1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="views/images/banner2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="views/images/banner3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="row" style="padding-top: 80px;">
            <div class="col-md-2">
                <?php 
                    if (!isset($_SESSION["username"])) {
                    require_once('index.php');
                ?>
                
                <?php 
                    } else if ($_SESSION['is_admin']==true){ 
                ?>
                <nav class="nav nav-pills flex-column">
                    <a class="nav-link" href="../post/indexPost.php">Manage Post</a>
                    <a class="nav-link" href="index.php?controller=users&action=create">Manage Users</a>
                    <a class="nav-link" href="index.php?controller=difficulty&action=readAll">Manage Difficulty Levels</a>
                    <a class="nav-link" href="index.php?controller=body_parts&action=readAll">Manage Body Part</a>
                </nav>
                <?php 
                    } 
                ?>
            </div>
            <div class="col-md-9">
                   <?php require_once('routes.php'); ?>
            </div>
        </div>
        <div class="container">
        <footer class="row">
            <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">
              <ul class="row">
                <li class="col-xs-6 col-sm-2">
                  <a href="#">
                    <img class="logo" src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_facebook-128.png">
                  </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                  <a href="#">
                    <img class="logo" src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/twitter_online_social_media-128.png">
                  </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                  <a href="#">
                    <img class="logo" src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/instagram_online_social_media_photo-128.png">
                  </a>
                </li>
                <li class="col-xs-6 col-sm-2">
                  <a href="#">
                    <img class="logo" src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_google_plus-128.png">
                  </a>
                </li>
              </ul>
            </div>

            <div class="copyright col-xs-12 col-sm-3 col-sm-pull-6">
              <p> &copy; Me from now to eternity </p>
            </div>

            <div class="impressum col-xs-12 col-sm-3 col-sm-pull-6">
              <p> An impressive impressum </p>
              <p> Adresse und so </p>
            </div>
        </footer>
        </div>
    </body>
</html>
