<?php
require_once 'employeeClass.php';
require_once 'userClass.php';

$employee = new employeeClass("John", 25, 1000);
$user = new userClass();

print_r("Name: {$employee->name}\nSalary: {$employee->salary}\n");