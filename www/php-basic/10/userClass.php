<?php
class userClass
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
        return $age >= 18 && $age <= 40 ? true : false;
    }
}