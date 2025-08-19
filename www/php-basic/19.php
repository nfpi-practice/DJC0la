<?php
class User
{
    private $name;
    private $age;
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($age)
    {
        $this->age = $age;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        return $this->name = $name;
    }
}

class Employee extends User
{
    private $salary;
    public function getSalary()
    {
        return $this->salary;
    }
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}

class Student extends User
{
    private $course;
    public function getCourse()
    {
        return $this->course;
    }
    public function setCourse($course)
    {
        $this->course = $course;
    }
}

class Programmer extends User
{
    private $langs = [];
    public function getLangs()
    {
        return $this->langs;
    }
    public function setLangs($langs)
    {
        $this->langs = $langs;
    }
}

$programmer = new Programmer;
$programmer->setLangs(["C++", "PHP"]);

print_r($programmer->getLangs()[1] . "\n");

class Driver extends Employee
{
    private $driveExp;
    private $driveCategory = [];
    public function getDriveExp()
    {
        return $this->driveExp;
    }
    public function setDriveExp($driveExp)
    {
        $this->driveExp = $driveExp;
    }
    public function getDriveCategory()
    {
        return $this->driveCategory;
    }
    public function setDriveCategory($driveCategory)
    {
        $this->driveCategory = $driveCategory;
    }
}

$driver = new Driver;
$driver->setDriveCategory(["A", "B", "C"]);
$driver->setDriveExp(5);
print_r($driver->getDriveExp() . "\n" . $driver->getDriveCategory()[1] . "\n");