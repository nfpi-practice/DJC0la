<?php

namespace Core\Data;

class Controller
{
    protected string $str = 'controller';

    public function __construct()
    {
        print_r($this->str . "<br>");
    }
}