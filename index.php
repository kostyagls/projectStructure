<?php

use app\components\Rout;

// 1. Підключення файлів системи
define('ROOT', dirname(__FILE__));
require_once('vendor/autoload.php');


$rout = new Rout();
$rout->run();

