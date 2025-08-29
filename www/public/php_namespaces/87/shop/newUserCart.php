<?php

namespace Modules\Shop;

require_once "Core/Cart.php";

class newUserCart extends Core\Cart
{
    public function __construct()
    {
        print_r(str_repeat($this->str, 2) . "<br>");
    }
}