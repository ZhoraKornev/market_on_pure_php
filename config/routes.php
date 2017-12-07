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
    'news/([0-9]+)' =>'news/view',
    'news/([a-z]+)/([0-9]+)' =>'news/view/$1/$2',
    'news' =>'news/index',

    'products' => 'product/list',
    'articles' => 'articles/list'
);