<?php
/*** Created by PhpStorm.* Date: 08.12.2017* Time: 08:18*/

class db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        try        {
        $db = new PDO($dsn, $params['user'], $params['password']);
        return $db;
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            //include(ROOT.'/function/errorPage.php'); // redirect for the error page
            die();
        }
    }
}
