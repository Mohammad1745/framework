<?php

namespace Framework\Http;

use Framework\View\View;

class Route
{
    /**
     *  routes = [
     *      'GET' => [
     *          ...
     *      ],
     *      'POST' => [
     *          ...
     *      ];
     * ];
     *
     */
    private static array $routes = [];

    /**
     * @param string $uri
     * @param string|callable|array $action
     * @return void
     */
    public static function get (string $uri, string|callable|array $action): void
    {
        self::$routes['GET'][$uri] = $action;
    }

    /**
     * @param string $uri
     * @param string|callable|array $action
     * @return void
     */
    public static function post (string $uri, string|callable|array $action): void
    {
        self::$routes['POST'][$uri] = $action;
    }

    /**
     * @return void
     */
    public static function run (): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        foreach (self::$routes[$method] as $key => $action) {
            if ($uri != $key) continue;
            if (is_string($action)) {
                echo View::render($action);
            }
            else if (is_array($action)) {
                $action[0] = new $action[0];
                echo call_user_func($action);
            }
            else {
                echo $action();
            }
        }
    }
}