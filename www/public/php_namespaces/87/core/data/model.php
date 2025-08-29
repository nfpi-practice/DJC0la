<?php

namespace Core\Data;

class Model
{
    protected string $str = 'model';

    public function __construct()
    {
        print_r($this->str. "<br>");
    }
}