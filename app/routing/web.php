<?php

namespace app\routing;

class web
{
    public static function getController($path, $request)
    {
        $controllers = json_decode(file_get_contents(realpath(__DIR__) . '/../../config/routing.json'));
        $path = self::getChecker($path);

        foreach ($controllers as $name => $controller) {

            $slug = self::slugChecker($path, $controller[0]->path);
            if ($controller[0]->path == $path || !empty($slug)) {
                [$class, $method] = explode('@', $controller[0]->controller);
                require_once((__DIR__ . '/../controllers/' . $class . '.php'));
                $class = "\\app\\controllers\\" . $class;
                if ((new $class)->{$method}($request, $slug)) {
                    exit(0);
                }
            }
        }
        echo '404';
        return false;
    }

    protected static function getChecker($path)
    {
        if (strpos($path, '?') !== false) {
            return explode('?', $path)[0];
        }
        return $path;
    }

    protected static function slugChecker($route_path, $routes)
    {
        $routes = explode('^', $routes);
        $route_path = explode('/', $route_path);

        if (count($routes) > 1) {

            $routes = str_replace('/', '', $routes[0]);

            if ($routes == $route_path[1]) {
                return $route_path[2];
            }
        }
    }
}
