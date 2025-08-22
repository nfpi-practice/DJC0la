<?php
interface iFigure {
    public function getSquare();
}

interface iTetragon {
    public function getA();
    public function getB();
    public function getC();
    public function getD();
}

class Rectangle implements iFigure, iTetragon {
    private $a;
    private $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }
    public function getA()
    {
        return $this->a;
    }
    public function getB()
    {
        return $this->b;
    }
    public function getC()
    {
        return $this->a;
    }
    public function getD()
    {
        return $this->b;
    }
    public function getSquare()
    {
        return $this->a * $this->b;
    }
}

$rectangle = new Rectangle(5, 6);
print_r("P: " . $rectangle->getPerimeter() . " S: " . $rectangle->getSquare() . "<br>");

interface iCircle {
    public function getRadius();
    public function getDiameter();
}

class Circle implements iCircle, iFigure {
    private $radius;
    const PI = 3.14;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getRadius()
    {
        return $this->radius;
    }
    public function getDiameter()
    {
        return $this->radius * 2;
    }
    public function getSquare()
    {
        return self::PI * $this->radius ** 2;
    }
}

$circle = new Circle(5);
print_r(" S: " . $circle->getSquare());