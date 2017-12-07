<?php
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 07.12.2017
 * Time: 15:34
 */

class news {

    public static function getNewsItemById() {
        
    }

    public static function getNewsList() {

    $host="localhost";           #Хост
    $login_mysql=   "webuser";      #Логин
    $password_mysql= "123";       #Пароль
    $dbname = "catalog";        #Имя базы
    $newsList = array();
        $i = 0;
        try        {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $login_mysql,$password_mysql);
            $result = $db->query('SELECT * FROM products ORDER BY id ASC LIMIT 10');
            print_r($result);
            echo '<br>';
            while($row = $result->fetch())
            {
                $newsList[$i]['id'] = $row['id'];
                $newsList[$i]['description'] = $row['description'];
                $i++;
            }
            $db = null;
            return $newsList;
        }
        catch (PDOException $e)
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            ROOT.'/function/'.errorPage;
            //die();
        }















}
    
}