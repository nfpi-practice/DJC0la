<?php

namespace Core\Admin;

class Controller
{
    public function method1()
    {
        return 1;
    }

    public function method2()
    {
        return 2;
    }

    public function method3()
    {
        return 3;
    }
}

class Model
{
    public function __construct()
    {
        print_r("Model1<br>");
    }
}