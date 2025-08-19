<?php
class forGetClass
{
    public $name;
}
$task1 = new forGetClass();
print_r("Task 1: " . get_class($task1) . "<br>");

class Test1
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}

class Test2
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
}
$arr1 = [new Test1("A"), new Test2("B"), new Test2("C"), new Test2("D"), new Test1("E")];
print_r("Task 2:<br>");
foreach ($arr1 as $item)
{
    print_r("Class: " . get_class($item) . " Name: " . $item->getName() ."<br>");
}

class Test
{
    public function method1()
    {
        print_r("method1<br>");
    }
    public function method2()
    {
        print_r("method2<br>");
    }
    public function method3()
    {
        print_r("method3<br>");
    }
}
$test = new Test();
$methods = get_class_methods($test);
print_r("Task 3:<br>");
foreach ($methods as $item)
{
    print_r($item . "<br>");
}

print_r("Task 4:<br>");
foreach ($methods as $item)
{
    $test->$item();
}

class Test3
{
    public $test1 = "test1";
    public $test2 = "test2";
    private $test3 = "test3";
    private $test4 = "test4";
    public function __construct($test1, $test2, $test3, $test4)
    {
        $this->test1 = $test1;
        $this->test2 = $test2;
        $this->test3 = $test3;
        $this->test4 = $test4;
        return $this;
    }
    public function getVars()
    {
        return get_class_vars(get_class($this));
    }
}

print_r("Task 6:<br>");
foreach (get_class_vars("Test3") as $item)
{
    print_r($item . "<br>");
}

print_r("Task 7:<br>");
$vars = (new Test3(1,2,3,4))->getVars();
foreach ($vars as $key => $value)
{
    print_r($key . "<br>");
}

print_r("Task 8:<br>");
class Test4
{
    public $test1 = "test1";
    public $test2 = "test2";
    private $test3 = "test3";
    private $test4 = "test4";
}
$test4 = new Test4();
print_r(get_object_vars($test4));
print_r("<br>");

print_r("Task 9:<br>");
var_dump(class_exists("Test4"));
var_dump(class_exists("Test44"));

print_r("<br>Task 10: ");
if (isset($_GET['class']))
{
    var_dump(class_exists($_GET['class']));
}

class Test5
{
    public function method1()
    {
        return "I am method1 in Test5";
    }
}
print_r("<br>Task 11: ");
var_dump(method_exists("Test5", "method1"));
var_dump(method_exists("Test5", "method2"));
// Task 12
print_r("<br>Task 12:<br>");
if (isset($_GET['classT12']))
{
    $classT12 = $_GET['classT12'];
    if (class_exists($classT12))
    {
        if (isset($_GET['method']))
        {
            $methodT12 = $_GET['method'];
            if (method_exists($classT12, $methodT12))
            {
                $task12 = new $classT12();
                print_r($task12->$methodT12());
            }
        }
    }
}

class Test6
{
    public $test1 = 1;
    public $test3 = 3;
    public $test4 = 4;
}
print_r("<br>Task 13: ");
var_dump(property_exists("Test6", "test1"));
var_dump(property_exists("Test6", "test2"));
// Task 14
$tests = ["test1", "test2","test3", "test4", "test5"];
print_r("<br>Task 14: <br>");
$test6 = new Test6();
foreach ($tests as $item)
{
    if (property_exists($test6, $item))
    {
        print_r($test6->$item . "<br>");
    }
}

print_r("Task 15: ");
class ParentClass
{
    public $name;
}
class ChildClass extends ParentClass
{
    public $surname;
}
print_r(get_parent_class("ChildClass") . "<br>");

class GrandParentClass
{
    public $age;
}
class ParentClass2 extends GrandParentClass
{
    public $name;
}
class ChildClass2 extends ParentClass2
{
    public $surname;
}

print_r("Task 17: ");
var_dump(is_subclass_of("ChildClass2", "GrandParentClass"));

print_r("<br>Task 18: ");
var_dump(is_subclass_of("ParentClass2", "GrandParentClass"));

print_r("<br>Task 19: ");
var_dump(is_subclass_of("ChildClass2", "ParentClass2"));

$obj = new ChildClass();

print_r("<br>Task 21: ");
var_dump(is_a($obj, "ChildClass"));

print_r("<br>Task 22: ");
var_dump(is_a($obj, "ParentClass"));

print_r("<br>Task 23: ");
$classes = get_declared_classes();
foreach ($classes as $key => $value)
{
    print_r($value . "<br>");
}