<?php
function call($controller, $action)
{
    // require the file that matches the controller name
    require_once('controllers/' . $controller . '_controller.php');

    // create a new instance of the needed controller
    switch ($controller) {
        //for non-data-driven pages use the PagesController class
        case 'body_parts':
            $controller = new BodyPartsController();
            break;
        case 'pages':
            $controller = new PagesController();
            break;
        case'difficulty':
            $controller = new DifficultyController();
            break; 
        case'filter':
            $controller = new HomePageController();
            break;
        case 'users':
            $controller = new UsersController();
            break;
        case 'posts':
            $controller = new PostsController();
            break;
        case 'login':
            $controller = new LoginController();
            break;
        case 'comments':
            $controller = new CommentsController();
            break;
        case 'images':
            $controller = new ImagesController();
            break;

        //we will need to add a separate case for each controller
        default:
            //for all data-driven pages use a specific Controller class
            //we need the model to query the database later in the process
            require_once("models/{$controller}.php");
            $controllerClassName = $controller . 'Controller';
            $controller = new $controllerClassName();
            break;
    }
    // call the requested action
    $controller->{$action}();
}

// for validation we list the allowed controllers and their actions
// Add an entry for each new controller and its actions
$controllers = array('pages' => ['home', 'home2', 'error','bmi'],
    'body_parts' => ['readAll','read','delete','update','create', 'readAll2'],
    'difficulty'=>['readAll','read','create','update','delete'],
    'posts'=>['readAll', 'findByDifficulty', 'findByBodyPart','update', 'create', 'uploadFile', 'delete', 'bigPost'],
    'users'=>['read','readAll','create', 'update', 'updateOne', 'register', 'readOne', 'delete'],
    'login'=>['validateLogin', 'logout'],
    'comments'=>['create', 'readAll'],
    'images'=>['upload', 'read', 'delete'],
);

// check that the requested controller and action are both allowed
// if someone tries to access something else they will be redirected
// to the error action of the pages controller


//$ controller and $action are already defined!
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action); //it will call $action ON the $controller object!
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
