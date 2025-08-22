<?php
class Employee
{
    public $name;
    public $age;
    public $salary;

    public function show($text)
    {
        return $text . "?!";
    }
}

$employee = new employeeClass();
echo $employee->show('name');