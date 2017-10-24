<?php
namespace app\controllers;

class ExampleController extends BaseController {

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

    public function slug($request, $slug)
    {
        echo $slug.'fds';
    }
}