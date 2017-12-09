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

    'alias/p([0-9]+)' => 'product/view/$1', // actionView в ProductController  'product/([0-9]+)' => 'product/view/$1',

    'catalog' => 'catalog/index', // actionIndex в CatalogController

    'alias/c([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController в более читабельном формате 'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'alias/c([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController в более читабельном формате 'category/([0-9]+)' => 'catalog/category/$1',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',

    'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController
    'cart/delete/([0-9]+)' => 'cart/delete', // actionDelete в CartController
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
    'cart' => 'cart/index', // actionIndex в CartController

    'cabinet/edit' => 'cabinet/edit',
    'cabinet' => 'cabinet/index',

    'contacts' => 'site/contact',

    '' => 'site/index', // actionIndex в SiteController
);