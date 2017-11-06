<?php
namespace app\hearth\bundles\controllers;


interface IController
{
    public function view($view, array $parameters);
}