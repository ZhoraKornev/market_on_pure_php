<?php
/** * Created by PhpStorm. * Date: 07.12.2017 * Time: 11:13 */


ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT',dirname(__FILE__));
require_once (ROOT.'/function/router.php');

$router = new router();
$router->run();