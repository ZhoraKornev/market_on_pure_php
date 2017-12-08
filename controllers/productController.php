<?php
/**
 * Created by PhpStorm.
 * User: ASUP7
 * Date: 08.12.2017
 * Time: 09:50
 */

class productController {
public function actionView($id){
    require_once (ROOT.'/views/product/view.php');
    return true;
}
}