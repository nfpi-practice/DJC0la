<?php
class Circle
{
    const PI = 3.14;
    private $radius;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getSquare()
    {
        return $this->radius ** 2 * self::PI;
    }
    public function getCircuit()
    {
        return $this->radius * 2 * self::PI;
    }
}
$circle = new Circle(10);
print_r("P: " . $circle->getCircuit() . "<br>S: " . $circle->getSquare());