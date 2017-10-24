<?php

namespace app\routing;

class web
{
    public static function getController($path, $request)
    {
        $routing = json_decode(file_get_contents(realpath(__DIR__) . '/../../config/routing.json'));

        $path = self::getChecker($path);

        foreach ($routing as $route => $controllers) {
            [$slug, $route_path] = self::slugChecker($path, $controllers);
            foreach ($controllers as $index => $attributes) {
                $config_path = explode('/', $attributes[0]->path);
                if ($route_path == $config_path[1]) {
                    [$class, $method] = explode('@', $attributes[0]->controller);
                    require_once(__DIR__ . '/../controllers/' . $class . '.php');
                    $controller = "\\app\\controllers\\" . $class;
                    (new $controller)->{$method}($request, $slug);
                }
            }
        }
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
        $route_path = explode('/', $route_path);
        $slug = null;

        foreach ($routes as $route) {
            $route = explode('/', $route[0]->path);
            if ($route[1] == $route_path[1]) {
                $slug = $route_path[2] ?? null;
            }
        }

        return [$slug, $route_path[1]];
    }
}
