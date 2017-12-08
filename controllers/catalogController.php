<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 * Time: 14:10
 */
include_once ROOT . '/models/category.php';
include_once ROOT . '/models/product.php';
include_once ROOT . '/function/pagination.php';

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

    public function actionCategory($categoryId, $page = 1)
    {
        $categories = array();
        $categories = category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = product::getProductsListByCategory($categoryId, $page);

        $total = product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/catalog/category.php');

        return true;
    }

}