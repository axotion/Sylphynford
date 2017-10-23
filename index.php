<?php
session_start();
require_once ('app/routing/web.php');
require_once('core/bundles/request/Request.php');

use app\routing\web;
use app\core\bundles\request\Request;

$url = $_SERVER['REQUEST_URI'];
$request = new Request($_GET, $_POST, $_COOKIE, $_SESSION);
web::getController($url, $request);