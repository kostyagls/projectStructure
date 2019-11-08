<?php

use app\models\User;

class MainController
{

    public function actionHome() {

        $user = new User();
        $userData = $user->getUser();

        require_once ROOT . '/views/home.php';
        return true;
    }

    public function actionError() {

        require_once ROOT . '/views/404.php';
        return true;
    }

}