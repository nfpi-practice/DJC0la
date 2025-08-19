<?php

class Employee
{
    private $name;
    private $surname;
    private $salary;

    public function __construct($name, $surname, $salary)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}

$Employee1 = new employeeClass("John", "Pork", 2000);
$Employee1->setSalary(1000);
print_r("Name: {$Employee1->getName()}\nSurname: {$Employee1->getSurname()}\nSalary: {$Employee1->getSalary()}\n");