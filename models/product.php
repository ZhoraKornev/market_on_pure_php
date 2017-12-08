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

    /**
     * Returns an array of products
     */
    public static function getProductsListByCategory($categoryId = false)
    {
        if ($categoryId) {

            $db = db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, tittle, price,price_new, image, is_new FROM products "
                . "WHERE status = '1' AND category_id = '$categoryId' "
                . "ORDER BY id DESC "
                . "LIMIT ".self::SHOW_BY_DEFAULT);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['tittle'] = $row['tittle'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $productsList[$i]['price_new'] = $row['price_new'];
                $products[$i]['is_new'] = $row['is_new'];
                $i++;
            }

            return $products;
        }
    }

    /**
     * Returns product item by id
     * @param integer $id
     */
    public static function getProductById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = db::getConnection();

            $result = $db->query('SELECT * FROM products WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }
    }



    /**
     * Returns an array of recommended products
     */
    public static function getRecommendedProducts()
    {
        $db = db::getConnection();

        $productsList = array();

        $result = $db->query('SELECT id, tittle, price, image, is_new FROM products '
            . 'WHERE status = "1" AND is_recommended = "1"'
            . 'ORDER BY id DESC ');

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['tittle'] = $row['tittle'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }























}