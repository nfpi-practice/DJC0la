<?php
class User
{
    public $name;
    public $age;
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

function compare($class1, $class2)
{
    return $class1 == $class2;
}

var_dump(compare((new User('John', 25)),(new User('John', 25))));

function compare2($class1, $class2)
{
    return $class1 === $class2;
}

$class1 = new User('John', 25);
$class2 = $class1;
var_dump(compare2($class1, $class2));

function compare3($class1, $class2)
{
    if ($class1 === $class2)
    {
        return 1;
    } elseif ($class1 == $class2)
    {
        return 0;
    } else
    {
        return -1;
    }
}

print_r(compare3($class1, $class2) . " " . compare3($class1, new User('John', 25)) . " " . compare3($class1, new User('John', 24)) . "<br>");

class Employee
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

class EmployeesCollection
{
    public $employees = [];
    public function add($employee)
    {
        if (!in_array($employee, $this->employees, false))
        {
            $this->employees[] = $employee;
        }
    }
}

$employees = new EmployeesCollection();
$employees->add(new Employee('John', 25));
$employees->add(new Employee('Bob', 24));
$employees->add(new Employee('John', 25));
foreach ($employees->employees as $employee)
{
    echo $employee->getName() . "<br>";
}