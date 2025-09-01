<?php

namespace Modules\Shop;

class UserCart extends Cart
{
    public function __construct()
    {
        $this->str = "child";
        parent::__construct();
    }
}