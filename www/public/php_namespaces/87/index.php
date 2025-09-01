<?php

namespace Admin;

require_once "shop/cart.php";
require_once "shop/userCart.php";

$cart = new \Modules\Shop\Cart();
$userCart = new \Modules\Shop\UserCart();

require_once "controller.php";

$controller = new Controller();

require_once "shop/newUserCart.php";
require_once "shop/core/cart.php";

$newCart = new \Modules\Shop\Core\Cart();
$newUserCart = new \Modules\Shop\newUserCart();

namespace Core\Data;

require_once "core/data/controller.php";
require_once "core/data/model.php";

$controller = new Controller();
$model = new Model();