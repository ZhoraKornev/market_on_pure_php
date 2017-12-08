<?php
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 08.12.2017
 * Time: 11:09
 */

class product {

    const SHOW_BY_DEFAULT = 10;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productsList = array();

        $result = $db->query('SELECT id, tittle, price, image,price_new, is_new FROM products WHERE status = "1" ORDER BY id DESC LIMIT '.$count);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['tittle'] = $row['tittle'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['price_new'] = $row['price_new'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }


}