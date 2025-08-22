<?php
class City
{
    public $name;
    public $population;
    public function __construct($name, $population)
    {
        $this->name = $name;
        $this->population = $population;
    }
}

$cities = [
    new City("Moscow", 100),
    new City("Madrid", 200),
    new City("Paris", 300),
    new City("London", 400)
];
foreach ($cities as $city) {
    echo $city->name . ", " . $city->population . "\n";
}