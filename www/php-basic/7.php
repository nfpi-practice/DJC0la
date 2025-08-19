<?php
class Employee {
    public $name;
    public $age;
    public $salary;
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
}

$employee1 = new employeeClass('Eric', 25, 1000);
$employee2 = new employeeClass('Kyle', 30, 2000);

echo $employee1->salary + $employee2->salary;