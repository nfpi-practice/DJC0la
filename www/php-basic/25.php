<?php
class Product
{
    private $name;
    private $price;
    private $quantity;
    public function __construct($name, $price, $quantity)
    {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getCost()
    {
        return $this->price * $this->quantity;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
}

class Cart
{
    public $products = [];
    public function add($product)
    {
        $this->products[] = $product;
    }
    public function remove($product)
    {
        $key = array_search($product, $this->products);
        if ($key !== false) {
            unset($this->products[$key]);
        }
    }

    public function getTotalCost()
    {
        $sum = 0;
        foreach ($this->products as $product)
        {
            $sum += $product->getCost();
        }
        return $sum;
    }

    public function getTotalQuantity()
    {
        $sum = 0;
        foreach ($this->products as $product)
        {
            $sum += $product->getQuantity();
        }
        return $sum;
    }

    public function getAvgPrice()
    {
        return $this->getTotalCost() / $this->getTotalQuantity();
    }
}

$cart = new Cart();
$cart->add(new Product('Juice', 50, 10));
$cart->add(new Product('Meat', 500, 5));
$cart->add(new Product('Milk', 90, 15));
$cart->remove(new Product('Milk', 90, 15));

foreach ($cart->products as $product) {
    echo $product->getName() . "<br>";
}
echo $cart->getTotalCost() . "<br>" . $cart->getTotalQuantity() . "<br>" . $cart->getAvgPrice() . "<br>";