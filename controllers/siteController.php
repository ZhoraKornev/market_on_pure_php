<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 */
/*include_once ROOT . '/models/category.php';
include_once ROOT . '/models/product.php';*/
class siteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = product::getLatestProducts(6);

        require_once (ROOT.'/views/main/index.php');
        return true;
    }
}