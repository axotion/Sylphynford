<?php
namespace app\core\bundles\controllers;


interface IController
{
    public function view($view, array $parameters);
}