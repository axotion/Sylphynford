<?php

namespace app\controllers;

use app\hearth\bundles\controllers\BaseController;

class ExampleController extends BaseController {

    public function hello($request)
    {
        // $this->redirect('/');
        return true;
    }

    public function world($request)
    {
        var_dump($this->container('test'));
        return true;
    }

    public function index($request)
    {

        $version = '0.1-alpha';
        $this->view('index', ['version'=> $version]);
        return true;
    }

    public function slug($request, array $slugs)
    {
        var_dump($slugs);
        return true;
    }
}