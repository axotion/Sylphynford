<?php
namespace app\routing;

use app\controllers;

class web
{
    public static function getController($path, $request)
    {
        $routing = json_decode(file_get_contents(realpath(__DIR__).'/../../config/routing.json'));
        
        $path = self::sanitizePath($path);
        foreach ($routing as $route => $controllers) {
            foreach ($controllers as $index => $attributes) {
               if ($path == $attributes[0]->path) {
                    [$class, $method] = explode('@', $attributes[0]->controller);
                    require_once(__DIR__.'/../controllers/'.$class.'.php');
                    $controller = "\\app\\controllers\\".$class;
                    (new $controller)->{$method}($request);
                }
            }
        }
    }

    protected static function sanitizePath($path)
    {
        if (strpos($path, '?') !== false) {
            return explode('?', $path)[0];
        }
        return $path;
    }
}
