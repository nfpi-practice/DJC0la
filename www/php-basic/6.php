<?php
class User
{
    public $name;
    public $age;

    public function setAge($newAge)
    {
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }

    public function addAge($age)
    {
        $newAge = $this->age + $age;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }

    public function subAge($age)
    {
        $newAge = $this->age - $age;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }
    private function isAgeCorrect($age)
    {
        return $age >= 18 && $age <= 60 ? true : false;
    }
}

class Student {
    public $name;
    public $course;
    public function transferToNextCourse()
    {
        if ($this->isCourseCorrect($this->course + 1)) {
            $this->course += 1;
        }
    }

    private function isCourseCorrect($course)
    {
        return $course <= 5 ? true : false;
    }
}

$user = new User;

$user->setAge(30);
print_r("{$user->age}\n");

$user->addAge(10);
print_r("{$user->age}\n");

$user->subAge(5);
print_r("{$user->age}\n");

$student = new Student;
$student->course = 4;

print_r("Student Course basic: {$student->course}\n");
$student->transferToNextCourse();
print_r("Student Course after 1: {$student->course}\n");
$student->transferToNextCourse();
print_r("Student Course after 2: {$student->course}\n");