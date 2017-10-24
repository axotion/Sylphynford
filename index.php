<?php
session_start();

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);
    require_once($class . '.php');
});

use app\core\bundles\request\Request;
use app\routing\web;

web::getController($_SERVER['REQUEST_URI'], new Request($_GET, $_POST, $_COOKIE, $_SESSION));