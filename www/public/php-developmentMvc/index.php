<?php

namespace Core;

use Core\Router;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';

spl_autoload_register(function ($class) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;

    $file = $root . $ds . str_replace('\\', $ds, $class) . '.php';
    require $file;;
});

$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';

$track = (new Router)->getTrack($routes, $_SERVER['REQUEST_URI']);
$page = (new Dispatcher)->getPage($track);