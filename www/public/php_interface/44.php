<?php
interface iSphere {
    const PI = 3.14;
    public function __construct($a);
    public function getVolume();
    public function getSquare();
}

class Sphere implements iSphere {
    private $a;
    public function __construct($a)
    {
        $this->a = $a;
    }
    public function getVolume()
    {
        return 4 / 3 * self::PI * $this->a ** 3;
    }
    public function getSquare()
    {
        return 4 * self::PI * $this->a ** 2;
    }
}

$sphere = new Sphere(10);
print_r("S: " . $sphere->getSquare() . " V: " . $sphere->getVolume());