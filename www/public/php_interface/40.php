<?php
interface iUser
{
    public function getName();
    public function setName($name);
    public function setAge($age);
    public function getAge();
}
interface iEmployee extends iUser
{
    public function getSalary();
    public function setSalary($salary);
}

class Employee implements iEmployee
{
    private $name;
    private $age;
    private $salary;
    public function setName($name)
    {
        $this->name = $name;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function setSalary($salary)
    {
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
}

$employee = new Employee();
$employee->setName("Bob");
$employee->setAge(22);
$employee->setSalary(4000);
print_r("Name: " . $employee->getName() . " Age: " . $employee->getAge() . " Salary: " . $employee->getSalary());