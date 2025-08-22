<?php
class Product
{
    public $name;
    public $price;
}

$product1 = new Product();
$product1->name = "cheese";
$product1->price = 200;
print_r($product1->name . " - " . $product1->price . "\n");
$product2 = $product1;
$product2->price = "250";
print_r($product1->name . " - " . $product1->price . "\n");