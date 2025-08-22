<?php
class User
{
    private $name;
    protected $age;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
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
    public function addOneYear()
    {
        $this->age += 1;
    }
}

$student = new Student();
$student->setAge(21);
print_r($student->getAge() . " - before\n");

$student->addOneYear();

print_r($student->getAge() . " - after\n");