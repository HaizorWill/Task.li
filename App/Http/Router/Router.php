<?php 
namespace App\Http\Router;

class Router {
    private static array $routes = [];

    public static function get(string $path, Object $callback): void {
        self::$routes['GET'][$path] = $callback;
    }

    public static function post() {
        self::$routes['POST'][$path] = $callback;
    }

    public static function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/');
        
        foreach (self::$routes[$method] as $route => $callback) {
            $pattern = preg_replace("#\{\w+\}#", "([^\/]+)", $route);
            
            if (preg_match("#^$pattern$#", $uri, $matches)) {
                array_shift($matches);
                call_user_func_array($callback, $matches);
                return;
            }
        }
        http_response_code(404);
    }
}
?>