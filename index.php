<?php

// FRONT CONTROLLER

// 1. Общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);


// ����������� ������ �������
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/function/Autoload.php');

// 4. Вызов Router
$router = new Router();
$router->run();
