<?php
class oldEmployee
{
    public $name;
    public $salary;
    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }
}

class Student
{
    public $name;
    public $scholarship;
    public function __construct($name, $scholarship)
    {
        $this->name = $name;
        $this->scholarship = $scholarship;
    }
}

$arr = [(new oldEmployee("John", 2000)), (new oldEmployee("Peter", 3000)), (new oldEmployee("Jim", 4000)),
    new Student("Johny", 500), (new Student("Jeremy", 600)), (new Student("Samanta", 700))];

foreach ($arr as $person)
{
    if ($person instanceof oldEmployee) print_r($person->name . "<br>");
}

foreach ($arr as $person)
{
    if ($person instanceof Student) print_r($person->name . "<br>");
}
$salarySum = 0;
$scholarshipSum = 0;
foreach ($arr as $person)
{
    if ($person instanceof Student) $scholarshipSum += $person->scholarship;
    else $salarySum += $person->salary;
}
print_r("Salary sum: " . $salarySum . "<br>Scholarship sum: " . $scholarshipSum);

class User
{
    public $name;
    public $surname;
    public function __construct($name, $surname)
    {
        $this->name = $name;
        $this->surname = $surname;
    }
}

class Employee extends User
{
    public $salary;
    public function __construct($name, $surname, $salary)
    {
        $this->salary = $salary;
        parent::__construct($name, $surname);
    }
}

class City
{
    public $name;
    public $population;
    public function __construct($name, $population)
    {
        $this->name = $name;
        $this->population = $population;
    }
}

$arr1 = [new User("John", "Pork"), new User("Peter", "Kaif"), new User("Jim", "Beam"),
    new Employee("Johny", "Evans", 3000), new Employee("Jeremy", "Stafford", 6700), new Employee("Samanta", "Black", 2500),
    new City("Tokyo", 20000000), new City("London", 10000000), new City("Moscow", 25000000)];
print_r("<br>");
foreach ($arr1 as $elem)
{
    if ($elem instanceof User) print_r($elem->name . "<br>");
}
foreach ($arr1 as $elem)
{
    if (!($elem instanceof User)) print_r($elem->name . "<br>");
}
foreach ($arr1 as $elem)
{
    if (($elem instanceof User) && !($elem instanceof Employee)) print_r($elem->name . "<br>");
}

class newEmployee
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

class newStudent
{
    private $name;
    private $scholarship; // стипендия

    public function __construct($name, $scholarship)
    {
        $this->name = $name;
        $this->scholarship = $scholarship;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getScholarship()
    {
        return $this->scholarship;
    }
}

class UsersCollection
{
    private $employees = [];
    private $students = [];
    public function add($user)
    {
        if ($user instanceof newStudent) $this->students[] = $user;
        else $this->employees[] = $user;
    }

    public function getTotalScholarship()
    {
        $sum = 0;
        foreach ($this->students as $student)
        {
            $sum += $student->getScholarship();
        }
        return $sum;
    }

    public function getTotalSalary()
    {
        $sum = 0;
        foreach ($this->employees as $employee)
        {
            $sum += $employee->getSalary();
        }
        return $sum;
    }

    public function getTotalPayment()
    {
        $sum = 0;
        $sum += $this->getTotalSalary();
        $sum += $this->getTotalScholarship();
        return $sum;
    }
}

$usersCollection = new UsersCollection;

$usersCollection->add(new newStudent('alex', 100));
$usersCollection->add(new newStudent('sophia', 200));

$usersCollection->add(new newEmployee('michael', 300));
$usersCollection->add(new newEmployee('emma', 400));


print_r($usersCollection->getTotalScholarship() . "<br>" . $usersCollection->getTotalSalary() . "<br>" . $usersCollection->getTotalPayment() . "<br>");