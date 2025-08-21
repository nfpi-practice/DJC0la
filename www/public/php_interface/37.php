<?php
interface iFigure
{
    public function getPerimeter();
}
class FiguresCollection
{
    private $figures = [];
    public function addFigure(iFigure $figure)
    {
        $this->figures[] = $figure;
    }

    public function getTotalPerimeter(): float
    {
        $sum = 0;
        foreach($this->figures as $figure)
        {
            $sum += $figure->getPerimeter();
        }
        return $sum;
    }
}

class Disk implements iFigure
{
    private $radius = 0.0;
    const PI = 3.14;
    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function getPerimeter(): float
    {
        return $this->radius * 2 * self::PI;
    }
}

class Quadrate implements iFigure
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
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

    public function getPerimeter()
    {
        return 2 * ($this->a + $this->b);
    }
}

$figureCollection = new FiguresCollection();
$figureCollection->addFigure(new Rectangle(5, 10));
$figureCollection->addFigure(new Quadrate(5));
$figureCollection->addFigure(new Disk(5));
print_r(" Total P: " . $figureCollection->getTotalPerimeter());