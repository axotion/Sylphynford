<?php

namespace app\controllers;

use app\core\bundles\controllers\BaseController;

class ExampleController extends BaseController {

    public function hello($request)
    {
        echo 'hello';
        return true;
    }

    public function world($request)
    {
        echo 'world';
        return true;
    }

    public function index($request)
    {
        $test = 1;
        $test2 = 'mua';
        $this->view('index', ['test'=> $test, 'test2' => $test2]);
        return true;
    }

    public function slug($request, $slug)
    {
        echo $slug;
        return true;
    }
}