<?php
class oldUser
{
    private $name = "John";
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }
}

class Student extends oldUser
{
    private $course;
    public function __construct($name, $age, $course)
    {
        parent::__construct($name, $age);
        $this->course = $course;
    }
    public function getCourse()
    {
        return $this->course;
    }
}

class User
{
    private $name = "John";
    private $surname = "Doe";
    private $age;
    private $birthDate;
    public function __construct($name, $surname, $birthDate)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthDate = date("Y-m-d", strtotime($birthDate));
        $this->age = $this->calculateAge();
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getAge()
    {
        return $this->age;
    }
    public function calculateAge()
    {
        $dateNow = date("Y-m-d");
        $userYear = date("Y", strtotime($this->birthDate));
        $userMonth = date("m", strtotime($this->birthDate));
        $userDay = date("d", strtotime($this->birthDate));
        $age = date("Y", strtotime($dateNow)) - $userYear;
        if ($userMonth > date("m", strtotime($dateNow))) $age -= 1;
        if ($userMonth == date("m", strtotime($dateNow)))
        {
            if ($userDay > date("d", strtotime($dateNow))) $age -= 1;
        }
        return $age;
    }
}

$user1 = new User("John", "Doe", "19.12.2003");
print_r($user1->getAge() ."\n");

class Employee extends User
{
    private $salary;
    public function __construct($name, $surname, $birthDate, $salary)
    {
        parent::__construct($name, $surname, $birthDate);
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$employee1 = new Employee("John", "Doe", "2003-12-19", 2000);
print_r($employee1->getName() . " " . $employee1->getSurname() . " " . $employee1->getBirthDate(). " " . $employee1->getAge() . " " . $employee1->getSalary());