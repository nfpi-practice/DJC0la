<?php
class Employee {
    public $name;
    public $age;
    public $salary;

}

$user1 = new employeeClass();
$user1->name = 'John';
$user1->age = 25;
$user1->salary = 1000;

$user2 = new employeeClass();
$user2->name = 'Eric';
$user2->age = 26;
$user2->salary = 2000;

$salarySum = $user1->salary + $user2->salary;
$ageSum = $user1->age + $user2->age;

print_r("Salary sum: {$salarySum}\nAge sum: {$ageSum}");