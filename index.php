<?php

// FRONT CONTROLLER

//  Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();


define('ROOT', dirname(__FILE__));
require_once(ROOT.'/function/Autoload.php');

// Вызов Router
$router = new Router();
$router->run();
