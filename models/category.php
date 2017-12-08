<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 * Time: 10:35
 */
include_once ROOT .'/function/db.php';
class category {

    /**
     * Returns an array of categories
     */
    public static function getCategoriesList()
    {

        $db = db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT id, name FROM category ORDER BY sort_order ASC');
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }

}