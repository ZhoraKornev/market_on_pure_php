<?php
/** * Created by PhpStorm.* Date: 08.12.2017* Time: 11:09*/
include_once ROOT .'/function/db.php';
class product {

    const SHOW_BY_DEFAULT = 1;

    /**
     * Returns an array of products
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = db::getConnection();
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
    public static function getProductsListByCategory($categoryId = false, $page = 1)
    {
        if ($categoryId) {

            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

            $db = Db::getConnection();
            $products = array();
            $result = $db->query("SELECT id, tittle, price, price_new, image, is_new FROM products "
                . "WHERE status = '1' AND category_id = '$categoryId' "
                . "ORDER BY id ASC "
                . "LIMIT ".self::SHOW_BY_DEFAULT
                . ' OFFSET '. $offset);

            $i = 0;
            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['tittle'] = $row['tittle'];
                $products[$i]['image'] = $row['image'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['price_new'] = $row['price_new'];
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


    public function getTotalProductsInCategory($categoryId) {
        $db = db::getConnection();

        $result = $db->query('SELECT count(id) AS COUNT FROM products WHERE status = "1" AND category_id=' . $categoryId.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC );

        return $result->fetch();
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