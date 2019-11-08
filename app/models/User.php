<?php

namespace app\models;

use app\components\Database;

class User
{

    public function getUser() {

        $db = Database::getInstance()->getConnection();

//        $data = $db->select();

        $data = 'User -> Kostya';
        return $data;
    }
}