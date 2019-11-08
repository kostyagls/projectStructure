<?php

namespace app\components;

use Medoo\Medoo;

class Database {

    private $connection;
    private static $instance;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        $dbParameters = include (ROOT.'/app/config/dbParameters.php');

        $this->connection = new Medoo([
            'database_type'=>'mysql',
            'database_name'=> $dbParameters['dbname'],
            'server'=> $dbParameters['server'],
            'username'=> $dbParameters['user'],
            'password'=> $dbParameters['password'],
            'charset'=>'utf8',

            'prefix'=>'slim_']);

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function getConnection() {
        return $this->connection;
    }

}