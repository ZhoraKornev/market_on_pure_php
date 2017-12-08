<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 * Time: 14:10
 */
include_once ROOT . '/models/category.php';
include_once ROOT . '/models/product.php';

class catalogController {
    public function actionIndex()
    {
        $categories = array();
        $categories = category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = product::getLatestProducts(12);

        require_once(ROOT . '/views/catalog/index.php');

        return true;
    }

    public function actionCategory($categoryId)
    {
        $categories = array();
        $categories = category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = product::getProductsListByCategory($categoryId);

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

}