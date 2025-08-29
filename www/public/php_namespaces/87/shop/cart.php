<?php

namespace Modules\Shop;

class Cart
{
    protected string $str = "Cart";

    public function __construct()
    {
        print_r("$this->str<br>");
    }
}