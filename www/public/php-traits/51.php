<?php

trait Trait1
{
    public function method1()
    {
        return 1;
    }

    public function method2()
    {
        return 2;
    }
}

trait Trait2
{
    use Trait1;

    public function method3()
    {
        return 3;
    }
}

class Test
{
    use Trait2;

    public function __construct()
    {
        echo $this->getSum();
    }

    public function getSum()
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}

new Test();