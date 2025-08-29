<?php

spl_autoload_register(function ($class) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;

    $file = $root . $ds . str_replace('\\', $ds, $class) . '.php';
    require $file;
    print_r("Pulled $file<br>");
});

new Core\Admin\Controller;

new Core\User;

new Project\User\Data;