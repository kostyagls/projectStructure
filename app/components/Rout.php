<?php

namespace app\components;

class Rout {

    private $routers;

    public function __construct() {

        $routesPath = ROOT . '/app/components/routs.php';

        $this->routers = include ($routesPath);

    }

    public function run() {

        $uri = $_SERVER['REQUEST_URI'];

        foreach ($this->routers as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $way = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $way);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));
                $parametrs = $segments;
                $controllerFile = ROOT . '/app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once $controllerFile;
                }

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);

                if ($result != NULL) {
                    break;
                }

            } else {

                include_once (ROOT. '/views/404.php');
                die();
            }
        }

    }
}