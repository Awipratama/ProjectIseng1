<?php
class Router
{
    public $routes = [];
    static Router $instance;

    public function addRoute($uri, $controller, $method = "GET")
    {
        if ($uri != '/') {
            $uri = trim($uri, '/');
        }

        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }
    public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new Router();
        }

        return static::$instance;
    }
    public static function __callStatic($name, $arguments)
    {
        $router = static::getInstance();
        $router->addRoute($arguments[0], $arguments[1], strtoupper($name));
    }
}
?>