<?php
require_once 'utilities.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
                integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
                integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
                integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="views/css/homeBody.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="views/css/blogSearchStyle.css" rel="stylesheet" type="text/css"/>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
<!--        <script src="jquery-3.4.1.min.js"></script>
        <script src="../../../libraries/ckeditor/ckeditor.js"></script>-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/962bdcfa7f.js" crossorigin="anonymous"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg  navbar-light fixed-top" style="background-color: #dcdcdc;">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-brand"
                       href="index.php?controller=pages&action=home">
                        <img src="views/images/IMG_02191.png" id="logo" alt="logo"/>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" style="float:right" id="navbarSupportedContent">
                    <?php
                    if (!isset($_SESSION["username"])) {
                        ?>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=pages&action=bmi">BMI calculator</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?controller=pages&action=home">Home <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=users&action=read">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=users&action=register">
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
                                <a class="nav-link" href="index.php?controller=pages&action=bmi">BMI calculator</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?controller=pages&action=home">Home <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=users&action=read">About</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z"
                                          clip-rule="evenodd"/>
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
        <?php if (!isset($hide_header)): ?>
            <div class="wrapper">
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
            </div>
        <?php endif; ?>

        <div class="container-fluid py3" style="margin-top: 150px; ">
            <div class="row">
                <!--        <div>-->
                <?php
                if (!isset($_SESSION["username"])) {
                    require_once('index.php');
                    ?>

                    <?php
                } else if ($_SESSION['is_admin'] == true) {
                    ?>
                    <div >
                        <aside class="list-group sidebar col2">
                            <a class="list-group-item list-group-item-action" href="index.php?controller=posts&action=readAll"><i class="fas fa-portrait"></i>Manage
                                Post</a>
                            <a class="list-group-item list-group-item-action" href="index.php?controller=users&action=readAll"><i class="fas fa-user"></i>Manage
                                Users</a>
                            <a class="list-group-item list-group-item-action"
                               href="index.php?controller=difficulty&action=readAll"><i class="fas fa-biking"></i>Manage Difficulty Levels</a>
                            <a class="list-group-item list-group-item-action"
                               href="index.php?controller=body_parts&action=readAll"><i class="fas fa-walking"></i>Manage Body Part</a>
                        </aside>
                    </div>
                    <?php
                } else {
                    ?>
                    <aside class="list-group sidebar col2">
                        <a class="list-group-item list-group-item-action" href="index.php?controller=posts&action=create">Create a Post</a>
                        <a class="list-group-item list-group-item-action" href="index.php?controller=users&action=readOne">Manage
                            Your Details</a>
                        <!--            <div class="list-group">-->
                    <?php } ?>
                </aside>
                <main class="container">
                    <?php require_once($view_path); ?>
                </main>

                <!--        </div>-->
            </div>
        </div>
        <div class="container">
            <?php if (isset($message)): ?>
                <script>alert('<?php echo $message ?>');</script>
            <?php endif ?>
            <footer class="row">
                <div class="sozial col-xs-12 col-sm-6 col-sm-push-6">
                    <ul class="row">
                        <li class="col-xs-6 col-sm-2">
                            <a href="#">
                                <img class="logo"
                                     src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_facebook-128.png">
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-2">
                            <a href="#">
                                <img class="logo"
                                     src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/twitter_online_social_media-128.png">
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-2">
                            <a href="#">
                                <img class="logo"
                                     src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/instagram_online_social_media_photo-128.png">
                            </a>
                        </li>
                        <li class="col-xs-6 col-sm-2">
                            <a href="#">
                                <img class="logo"
                                     src="https://cdn2.iconfinder.com/data/icons/black-white-social-media/32/online_social_media_google_plus-128.png">
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

