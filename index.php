<?php
session_start();

require_once('app/routing/web.php');
require_once('app/core/bundles/request/Request.php');
require_once('app/controllers/BaseController.php');

use app\core\bundles\request\Request;
use app\routing\web;

web::getController($_SERVER['REQUEST_URI'], new Request($_GET, $_POST, $_COOKIE, $_SESSION));