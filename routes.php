<?php
//class Routes{
//    
//    private $uri = array();
//    //builds collection of internal URL's to look for @param type$uri
//    
//    public function add ($uri){
//        $this-> uri[]=$uri;
//    }
//    public function submit (){
//       echo $uriGetParam = isset($_GET['uri']) ? $_GET['uri'] : '/' ;
//               foreach ($this->_uri as $Key => $Value){
//                   echo '<br>' . $value;
//
//            if(preg_match("#^$Value#^", $uriGetParam)){
//                echo "match";
//            }
//        }
//    }
//    
//    public static $validroutes= array();
//    public static function set($route,$function){
//        self::$validroutes[]=$route;
//        
//        print_r(self::$validroutes);
//    }
//}

//function setRoute($config) 
//{
//    $myroutes = View::$config->load($config);
//     foreach ($myroutes as $name => $rout) {
//         Route::set($name, $rout["URI"])->defaults($rout["defaults"]);
//    
//}
//Route:: set(''. function(){
//    View::make('root');
//});
//
//Route: set ('body_parts', function(){
//    View:make('body_parts');
//});

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
   'controllerXXX' => ['actionYYY', 'actionZZZ'],
);

// check that the requested controller and action are both allowed
// if someone tries to access something else they will be redirected
// to the error action of the pages controller

////$ controller and $action are already defined!
if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action); //it will call $action ON the $controller object!
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
