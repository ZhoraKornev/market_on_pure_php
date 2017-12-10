<?php
/**
 * Created by PhpStorm.
 * User: Жорик
 * Date: 10.12.2017
 * Time: 22:14
 */

class breadCrumbs
{
    public static function run()
    {
        $cur_url = $_SERVER['REQUEST_URI'];
        $urls = explode('/', $cur_url);

        print_r($urls);

        echo " <div class=\"breadcrumbs\">
        <ol class=\"breadcrumb\">
            <li><a href=\"/admin\">Админпанель</a></li>
            <li><a href=\"/admin/order\">Управление заказами</a></li>
            <li class=\"active\">Редактировать заказ</li>
        </ol>
    </div>";

        echo "<div itemscope itemtype=\"http://data-vocabulary.org/Breadcrumb\">        <a href=\"$item['url']\"> itemprop=\"url\">            <span itemprop=\"title\">$item['text'] </span>        </a>    </div>";

        $crumbs = array();

        if (!empty($urls) && $cur_url != '/') {
            foreach ($urls as $key => $value) {
                $prev_urls = array();
                for ($i = 0; $i <= $key; $i++) {
                    $prev_urls[] = $urls[$i];
                }
                if ($key == count($urls) - 1)
                    $crumbs[$key]['url'] = '';
                elseif (!empty($prev_urls))
                    $crumbs[$key]['url'] = count($prev_urls) > 1 ? implode('/', $prev_urls) : '/';

                switch ($value) {
                    case 'about' :
                        $crumbs[$key]['text'] = 'О нас';
                        break;
                    case 'catalog' :
                        $crumbs[$key]['text'] = 'Каталог';
                        break;
                    case 'blog' :
                        $crumbs[$key]['text'] = 'Блог';
                        break;
                    case 'contacts' :
                        $crumbs[$key]['text'] = 'Контакты';
                        break;
                    case 'alias/c([0-9]+)' :
                        $crumbs[$key]['text'] = 'Товары';
                        break;
                    case 'cabinet' :
                        $crumbs[$key]['text'] = 'Кабинет';
                        break;
                    default :
                        $crumbs[$key]['text'] = 'Главная страница';
                        break;
                }
            }
        }

    }

}