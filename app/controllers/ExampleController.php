<?php
namespace app\controllers;

class ExampleController {

    public function hello($request)
    {
       echo "hello";
    }

    public function world($request)
    {
        echo "world";
    }

    public function index($request)
    {
        var_dump($request);
    }
}