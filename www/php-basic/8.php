<?php
class Employee {
    private $name;
    private $age;
    private $salary;
    public function __construct($name, $age, $salary)
    {
        $this->name = $name;
        $this->age = $age;
        $this->salary = $salary;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getSalary()
    {
        return $this->salary;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) $this->age = $age;
    }
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
    private function isAgeCorrect($age)
    {
        return $age <= 100 && $age >= 1;
    }
}

$Employee1 = new employeeClass("John", 20, 2000);
print_r("Name: {$Employee1->getName()}\nAge: {$Employee1->getAge()}\nSalary: {$Employee1->getSalary()}\n");