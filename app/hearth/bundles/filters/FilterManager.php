<?php

namespace app\hearth\bundles\filters;

class FilterManager
{
    /**
     * @param $class
     * @param $path
     * @param $request
     */
    public function call($class, $path, $request) {
        $class = '\\app\filters\\'.$class;
        (new $class)->handle($path, $request);
    }
}