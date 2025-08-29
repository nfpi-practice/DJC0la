<?php
require_once 'core/core.php';
require_once 'project/project.php';

$coreController = new Core\Controller();
$projectController = new Project\Controller();

print_r("<br><br>");

require_once "modules/cart.php";
require_once "modules/shop/cart.php";

$defaultCart = new Modules\Cart\ShoppingCart();
$shoppingCart = new Modules\Shop\Cart\ShoppingCart();

print_r("<br><br>");

require_once "modules/shopCart.php";
require_once "modules/marketCart.php";

$marketCart = new Market\Cart\Cart();
$shopCart = new Shop\Cart\Cart();