<?php
/**
 * Created by PhpStorm.
 * Date: 08.12.2017
 */

class siteController
{
    public function actionIndex()
    {
        require_once (ROOT.'/views/main/index.php');
        return true;
    }
}