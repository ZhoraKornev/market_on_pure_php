<?php
/**
 * Created by PhpStorm.
 * Date: 07.12.2017
 * Time: 11:35
 */
$host="localhost";        #Хост
$login_mysql="root";      #Логин
$password_mysql="";       #Пароль
$baza_name="catalogue";   #Имя базы
$db = @mysql_connect("$host", "$login_mysql", "$password_mysql");
if (!$db) exit("<p>К сожалению, не доступен сервер MySQL</p>");
if (!@mysql_select_db($baza_name,$db)) exit("<p>К сожалению, не доступна база данных</p>");
?>