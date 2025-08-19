<?php
class Employee {
    public $name;
    public $age;
    public $salary;
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
    public function checkAge()
    {
        return $this->age > 18;
    }
    public function doubleSalary()
    {
        $this->salary *= 2;
    }
}

class User {
    public $name;
    public $age;
    public function setAge($newAge)
    {
        if ($newAge >= 18) {
            $this->age = $newAge;
        }
    }
}

class Rectangle {
    public $width;
    public $height;
    public function getSquare()
    {
        return $this->width * $this->height;
    }
    public function getPerimeter()
    {
        return $this->width * 2 + $this->height * 2;
    }
}

$employee1 = new employeeClass();
$employee1->name = 'John';
$employee1->age = 25;
$employee1->salary = 1000;

$employee2 = new employeeClass();
$employee2->name = 'Eric';
$employee2->age = 26;
$employee2->salary = 2000;

$user1 = new User();
$user1->name = 'John';
$user1->age = 25;
$user1->setAge(30);

$salarySum = $employee1->getSalary() + $employee2->getSalary();

$employee1->doubleSalary();

$rectangle = new Rectangle();
$rectangle->width = 20;
$rectangle->height = 10;

print_r("Rectangle square: {$rectangle->getSquare()}\nRecangle perimeter: {$rectangle->getPerimeter()}\n");
echo "Salary sum: $salarySum\n";
echo "User name: {$user1->name}\nUser age: {$user1->age}\n";
echo "Employee1 Salary after doubling: {$employee1->getSalary()}\n";
echo "Rectangle square: {$rectangle->getSquare()}\n";
echo "Rectangle perimeter: {$rectangle->getPerimeter()}\n";