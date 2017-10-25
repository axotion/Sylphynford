<?php
session_start();

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);
    require_once('../'.$class . '.php');
});

use app\hearth\bundles\middleware\Middleware;
use app\hearth\bundles\request\Request;
use app\hearth\bundles\routing\web;
use app\hearth\bundles\ioc\IoC;
use app\providers\ServiceContainer;

IoC::init();

$path = $_SERVER['REQUEST_URI'];
$request = new Request($_GET, $_POST, $_COOKIE, $_SESSION);

////Register services
$mainProvider = new ServiceContainer();
$mainProvider->register();


web::getController($path, $request, new Middleware(), $_SERVER['REQUEST_METHOD']);