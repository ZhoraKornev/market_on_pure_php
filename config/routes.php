<?php
/**
 * Created by PhpStorm.
 * Date: 07.12.2017
 * Time: 13:29
 */

/*
 * •	Роутинг должен быть реализован в виде:
Domen/alias/c<id> - Категория товаров  ---> catalogController
Domen/alias/p<id> - Товар --->productController
 */

return array(
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController

    'catalog' => 'catalog/index', // actionIndex в CatalogController
    'category/([0-9]+)' => 'catalog/category/$1',  // actionCategory в CatalogController

    '' => 'site/index', // actionIndex в SiteController
);