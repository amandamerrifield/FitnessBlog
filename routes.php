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
<<<<<<< HEAD
         case'homePage':
            $controller = new HomePageController();
=======
        case 'users':
            $controller = new UserController();
>>>>>>> 63103dfa95e43d9afc1486a5bdd1196b15feb944
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
$controllers = array('pages' => ['home', 'error'],
    'body_parts' => ['readAll','read','delete','update','create'],
    'difficulty'=>['readAll','read','create','update','delete'],
    'homePage'=>['readAll'],
    'users'=>['readAll','create'],
    'controllerXXX' => ['actionYYY', 'actionZZZ'],
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
