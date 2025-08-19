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
        if (strlen($name) > 3) {
            $this->name = $name;
        }
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
    public function setName($name)
    {
        if (strlen($name) < 10)
        {
            parent::setName($name);
        }
    }
}

$student = new Student();
$student->setName("John");
print_r($student->getName() . " - before\n");
$student->setName("Jooooooooo");
print_r($student->getName() . " - after1\n");
$student->setName("Joh");
print_r($student->getName() . " - after2\n");