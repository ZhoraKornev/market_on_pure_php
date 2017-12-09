<?php
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 07.12.2017
 * Time: 11:52
 */

class router {
private $routes;

public function __construct()
{
$routesPath = ROOT.'/config/routes.php';
$this->routes = include($routesPath) ;

}

    /**
     * @return request string
     */
private function getURI()
{
    if (!empty($_SERVER['REQUEST_URI']))
    {
        return trim($_SERVER['REQUEST_URI'], '/');

    }
}



    public function run()
    {
    //print_r($_SERVER['REQUEST_URI']);

    //receive get
    $uri = $this->getURI();
    //echo $uri;

    //chek if exist in routes
        foreach ($this->routes as $uriPattern =>$path)
        {
            if (preg_match("~$uriPattern~", $uri))
            {
                //create inner way from global with pattern
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);

                //check action for request
                $segments = explode('/',$internalRoute);
                //print_r($segments);
                $controllerName = array_shift($segments).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));
                $parameters = $segments;
                //print_r($parameters);

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile))
                {
                    include_once ($controllerFile);
                }

                //create object class controller
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);
                if ($result != null)
                {
                    break;
                }
            }
        }
    }
}