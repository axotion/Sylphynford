<?php
namespace app\core\bundles\controllers;

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
}