<?php

namespace Modules\Shop\Core;

class Cart
{
    protected string $str = 'djcola';
    public function __construct()
    {
        print_r($this->str . "<br>");
    }
}