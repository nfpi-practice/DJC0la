<?php
class Student {
    private $name;
    private $course;
    public function __construct($name)
    {
        $this->name = $name;
        $this->course = 1;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getCourse()
    {
        return $this->course;
    }
    public function transferToNewCourse()
    {
        if ($this->isValidNewCourse()) $this->course++;
    }
    private function isValidNewCourse()
    {
        return ($this->course <= 4) ? true : false;
    }
}

$student = new Student('john');

print_r("Before course: {$student->getCourse()}\n");
$student->transferToNewCourse();
print_r("Next year course: {$student->getCourse()}\n");
$student->transferToNewCourse();
print_r("Next year course: {$student->getCourse()}\n");
$student->transferToNewCourse();
print_r("Next year course: {$student->getCourse()}\n");
$student->transferToNewCourse();
print_r("Next year course: {$student->getCourse()}\n");
$student->transferToNewCourse();
print_r("Next year course: {$student->getCourse()}\n");