<?php
interface iProgrammer {
    public function __construct($name, $salary);
    public function getName();
    public function getSalary();
    public function getLangs();
    public function addLang($lang);
}

class Employee {
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

class Programmer extends Employee implements iProgrammer {
    private $langs = [];
    public function getLangs()
    {
        return $this->langs;
    }
    public function addLang($lang)
    {
        $this->langs[] = $lang;
    }
}

$programmer = new Programmer('Bob', 200);
$programmer->addLang('PHP');
$programmer->addLang('Python');
$programmer->addLang('C++');
print_r("Name: " . $programmer->getName() . " Salary: " . $programmer->getSalary() . " Langs: ");
foreach ($programmer->getLangs() as $lang)
{
    print_r($lang . " ");
}