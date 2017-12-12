<?php

namespace app\hearth\bundles\routing;

class Http
{
    /**
     * @param $path
     * @param $request
     * @param $filter
     * @param $method
     * @return bool
     * @internal param $middleware
     */
    public static function getController($path, $request, $filter, $method)
    {
        $controllers = json_decode(file_get_contents(realpath(__DIR__) . '/../../../../config/routing.json'));
        $path = self::getChecker($path);


        foreach ($controllers as $name => $controller) {
            if ($controller[0]->slugs) {
                $slug = self::slugChecker($path, $controller[0]->path);
            } else {
                $slug = false;
            }
            if (($controller[0]->path == $path || $slug) && $controller[0]->method == $method) {
                if (!empty($controller[0]->filter)) {
                    $filter->call($controller[0]->filter, $path, $request);
                }
                [$class, $method] = explode('@', $controller[0]->controller);
                require_once((__DIR__ . '/../../../controllers/' . $class . '.php'));
                $class = "\\app\\controllers\\" . $class;
                if ((new $class)->{$method}($request, $slug)) {
                    exit(0);
                }
            }
        }
        echo '404';
        return false;
    }

    /**
     * @param $path
     * @return mixed
     */
    protected static function getChecker($path)
    {
        if (strpos($path, '?') !== false) {
            return explode('?', $path)[0];
        }
        return $path;
    }

    /**
     * @param $route_path
     * @param $routes
     * @return null
     */
    protected static function slugChecker($route_path, $routes)
    {
        $slugs = explode('|', $routes);
        $route_path = explode('/', $route_path);
        unset($route_path[0]);

        //Check if base path exists. Then return array of slugs or false
        if (strpos($slugs[0], $route_path[1]) !== false) {
            //Delete base path from array of slugs
            unset($route_path[1]);
            return array_values($route_path);
        }
        return false;
    }
}
