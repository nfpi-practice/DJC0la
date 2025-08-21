<?php
interface Figure3D
{
    public function getVolume();
    public function getSurfaceSquare();
}

class Cube implements Figure3D
{
    private $a;
    public function __construct($a)
    {
        $this->a = $a;
    }
    public function getVolume()
    {
        return $this->a ** 3;
    }
    public function getSurfaceSquare()
    {
        return $this->a * 2 * 6;
    }
}

interface iFigure
{
    public function getSquare();
    public function getPerimeter();
}

class Quadrate implements iFigure
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getSquare()
    {
        return $this->a * $this->a;
    }

    public function getPerimeter()
    {
        return 4 * $this->a;
    }
}

class Rectangle implements iFigure
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getSquare()
    {
        return $this->a * $this->b;
    }

    public function getPerimeter()
    {
        return 2 * ($this->a + $this->b);
    }
}

$arr = [new Cube(3), new Cube(4), new Cube(5),
    new Rectangle(3, 4), new Rectangle(3, 4), new Quadrate(5), new Quadrate(6), new Quadrate(7)];

foreach ($arr as $item)
{
    if ($item instanceof iFigure)
    {
        print_r($item->getSquare() . " ");
    }
}
print_r("<br>");
foreach ($arr as $item)
{
    if ($item instanceof iFigure)
    {
        print_r($item->getSquare() . " ");
    }
    else
    {
        print_r($item->getSurfaceSquare() . " ");
    }
}