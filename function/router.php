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
        echo $uri;

    //chek if exist in routes

        foreach ($this->routes as $uriPattern =>$path)
        {
            if (preg_match("~$uriPattern~", $uri))
            {
                echo "exist";
            }
        }


    }
}