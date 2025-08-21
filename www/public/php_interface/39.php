<?php
interface iCube
{
    public function __construct($a);
    public function getVolume();
    public function getSurfaceSquare();
}

class Cube implements iCube
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

$cube = new Cube(5);
print_r("Cube V: " . $cube->getVolume() . " S: " . $cube->getSurfaceSquare());

interface iUser
{
    public function __construct($user, $age);
    public function getName();
    public function getAge();
}

class User implements iUser
{
    private $name;
    private $age;
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
}

$user = new User("John", 42);
print_r("<br>User: " . $user->getName() . " Age: " . $user->getAge());