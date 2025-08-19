<?php
class City
{
    public $name;
    public $population;
    public $foundation;
    public function __construct($name, $population, $foundation)
    {
        $this->name = $name;
        $this->population = $population;
        $this->foundation = $foundation;
    }
}

$city = new City("Paris", 400, 1002);
$props = ["name", "population", "foundation"];
foreach ($props as $prop) {
    print_r("{$city->$prop}\n");
}

class User
{
    public $surname;
    public $name;
    public $patronymic;

    public function __construct($surname, $name, $patronymic)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronymic = $patronymic;
    }
}

$user = new User("Shcherbakov", "Nikolau", "Aleksandrovich");
$props = ["surname", "name", "patronymic"];
print_r("{$user->{$props[0]}} {$user->{$props[1]}} {$user->{$props[2]}}\n");