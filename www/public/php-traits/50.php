<?php

trait TestTrait
{
    public function method1()
    {
        return 1;
    }

    abstract public function method2();
}

class Test
{
    use TestTrait;

    public function method2()
    {
        return 2;
    }
}

print_r("Methods sum: " . (new Test())->method1() + (new Test())->method2());