<?php

// FRONT CONTROLLER

// 1. ĞĞ±Ñ‰Ğ¸Ğµ Ğ½Ğ°ÑÑ‚Ñ€Ğ¾Ğ¹ĞºĞ¸
ini_set('display_errors',1);
error_reporting(E_ALL);


// Ïîäêëş÷åíèå ôàéëîâ ñèñòåìû
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/function/Autoload.php');

// 4. Ğ’Ñ‹Ğ·Ğ¾Ğ² Router
$router = new Router();
$router->run();
