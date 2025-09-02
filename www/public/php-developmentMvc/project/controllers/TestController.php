<?php

namespace Project\Controllers;

use Core\Controller;

class TestController extends Controller
{
    public function test(): void
    {
        echo 'test';
    }

    public function test2(): string
    {
        return $this->render('test/test1', ['value' => "test"]);
    }
}