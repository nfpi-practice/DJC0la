<?php

class User
{
    private $name;
    private $age;

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        if ($property == 'name') {
            if ($value != '') {
                $this->$property = $value;
            }
        }
        if ($property == 'age') {
            if ($value >= 0 and $value <= 70) { // проверяем возраст
                $this->$property = $value;
            }
        }
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->age;
    }
}

$user = new User();
$user->name = 'Bob';
$user->age = 12;
echo $user;
