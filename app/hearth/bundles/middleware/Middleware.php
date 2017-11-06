<?php

namespace app\hearth\bundles\middleware;

class Middleware
{
    /**
     * @param $class
     * @param $path
     * @param $request
     */
    public function call($class, $path, $request) {
        $class = '\\app\middleware\\'.$class;
        (new $class)->handle($path, $request);
    }
}