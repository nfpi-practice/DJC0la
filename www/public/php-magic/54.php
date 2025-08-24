<?php

class User
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}

$user = new User("Bob", 12);
print_r($user->name . " " . $user->age . "<br>");

class Date
{
    public $year;
    public $month;
    public $day;

    public function __construct($year, $month, $day)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    public function __get($value)
    {
        if ($value == "weekDay") {
            return date("l", strtotime($this->day . "-" . $this->month . "-" . $this->year));
        }
    }
}

$date = new Date(29, 07, 2025);
print_r($date->weekDay);