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

        $version = '0.1-alpha';
        $this->view('index', ['version'=> $version]);
        return true;
    }

    public function slug($request, $slug)
    {
        echo $slug;
        return true;
    }
}