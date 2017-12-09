<?php
/**
 * Created by PhpStorm.
 * User: Жорик
 * Date: 09.12.2017
 * Time: 23:38
 */

class order
{

    /**
     * Сохранение заказа
     * @param type $name
     * @param type $email
     * @param type $password
     * @return type
     */
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $products = json_encode($products);

        $db = db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products) '
            . 'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

}