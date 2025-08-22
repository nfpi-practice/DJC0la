<?php
class employeeClass {
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