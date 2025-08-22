<?php
interface iTest1 {
    public function doSomething();
}

print_r("Task 1: ");
var_dump(interface_exists('iTest1'));
var_dump(interface_exists('Test2'));

interface iMemememe {
    public function doSomething();
}
interface iTrollface {
    public function doSomething();
}

$interfaces = get_declared_interfaces();
print_r("<br>Task 2: ");
foreach ($interfaces as $interface)
{
    print_r($interface . " ");
}