<?php
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 07.12.2017
 * Time: 14:14
 */
include_once ROOT.'/models/news.php';

class newsController {
    public function actionIndex() {
        $newsList = news::getNewsList();
        print_r($newsList);
        //echo 'newsController actionIndex';
        return true;
    }

    public function actionView($category,$id){

        echo $category;
        echo $id;
       // echo 'view for current new';

    }
}