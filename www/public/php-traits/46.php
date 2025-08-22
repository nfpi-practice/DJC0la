<?php

trait Helper
{
    private string $name;
    private int $age;

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }
}

class Country
{
    use Helper;

    private int $population;

    public function __construct(string $name, int $age, int $population)
    {
        $this->name = $name;
        $this->age = $age;
        $this->population = $population;
    }

    public function getPopulation(): int
    {
        return $this->population;
    }
}

$country = new Country("Paris", 2003, 200);
print_r($country->getName() . " " . $country->getAge() . " " . $country->getPopulation() . "<br>");

trait Trait1
{
    private function method1(): int
    {
        return 1;
    }
}

trait Trait2
{
    private function method2(): int
    {
        return 2;
    }
}

trait Trait3
{
    private function method3(): int
    {
        return 3;
    }
}

class Test
{
    use Trait1, Trait2, Trait3;

    public function getSum(): int
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}

print_r("Methods sum: " . (new Test())->getSum());