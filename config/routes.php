<?php
/**
 * Created by PhpStorm.
 * Date: 07.12.2017
 * Time: 13:29
 */

/*
 * •	Роутинг должен быть реализован в виде:
Domen/alias/c<id> - Категория товаров
Domen/alias/p<id> - Товар

 */

return array(
    'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
    '' => 'site/index', // actionIndex в SiteController
);