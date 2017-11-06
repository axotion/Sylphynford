<?php
namespace app\hearth\bundles\controllers;

use app\hearth\bundles\ioc\IoC;

class BaseController implements IController {

    public function view($view, array $parameters)
    {
        $parameter = [];
        //Save our parameters to array. We can use them because later we will include view (same scope for vars)
        foreach ($parameters as $key=> $value)
        {
            $parameter[$key] = $value;
        }
        include __DIR__ . '/../../../views/' .$view.'.php';
    }

    public function validate($request, $data)
    {

    }

    public function container($name) {
        return IoC::resolve($name);
    }

    public function redirect($url) {
        header('Location:'.$url);
    }
}