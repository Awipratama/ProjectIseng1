<?php
require_once __DIR__ . './controller.php';
require_once __DIR__ . './router.php';
class App
{
    protected $router;
    protected static App $instance;
    public function __construct()
    {
        $this->router = Router::getInstance();
    }
    public static function getInstance()
    {
        if (!isset(static::$instanance)) {
            static::$instance = new App;
        }

        return static::$instance;
    }
    public function run() {
        $uri = str_replace($_SERVER['SCRIPT_NAME'], "", $_SERVER['REQUEST_URI']);

        $uri = $uri == '/' ? '/' : trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->router->routes as  $route) {
            if ($uri == $route['uri'] && $method == $route['method']) {
                $class = new $route['controller'][0];
                $class->{$route['controller'][1]}();
                return;
            }
        }

        require_once __DIR__ . './../views/notFound.html';
        return;
    }
}
?>