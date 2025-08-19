<?php
class Post
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

$programmer = new Post("salesman", 200000);
$manager = new Post("manager", 4000);
$driver = new Post("driver", 10000);

class Employee
{
    private $name;
    private $surname;
    private $post;
    public function __construct($name, $surname, Post $post)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->post = $post;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    public function getPost(): Post
    {
        return $this->post;
    }

    public function changePost(Post $newPost)
    {
        $this->post = $newPost;
    }
}

$employee1 = new Employee("john", "doe", $programmer);
print_r($employee1->getName() . " " . $employee1->getSurname() . " " . $employee1->getPost()->getName() . " " . $employee1->getPost()->getSalary() . "<br>");
$employee1->changePost($driver);
print_r($employee1->getName() . " " . $employee1->getSurname() . " " . $employee1->getPost()->getName() . " " . $employee1->getPost()->getSalary());