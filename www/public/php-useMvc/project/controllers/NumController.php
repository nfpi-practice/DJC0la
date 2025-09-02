<?php

namespace Project\Controllers;

use Core\Controller;

class NumController extends Controller
{
    public function sum(array $params): void
    {
        $this->title = 'Операция sum контроллера num';
        $sum = 0;

        foreach ($params as $param) {
            $sum += (int)$param;
        }

        echo $sum;
    }
}