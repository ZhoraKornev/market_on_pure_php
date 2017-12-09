<?php
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 08.12.2017
 * Time: 09:10
 */

class blogController {

    public function actionIndex()
    {
        $blogList = array();
        $blogList = blog::getBlogList();

        require_once(ROOT . '/views/blog/index.php');

        return true;
    }

    public function actionView($id)
    {
        if ($id) {
            $newsItem = blog::getNewsItemById($id);
            require_once(ROOT . '/views/blog/view.php');
        }

        return true;
    }
}