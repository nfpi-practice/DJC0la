<?php
interface iFigure
{
    public function getSquare();
}

class Disk implements iFigure
{
    private float $radius;
    const PI = 3.14;
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getSquare(): float
    {
        return $this->radius ** 2 * self::PI;
    }

}
$disk = new Disk(6);
print_r($disk->getSquare());