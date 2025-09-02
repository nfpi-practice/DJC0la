<?php

namespace Project\Controllers;

use Core\Controller;
use Project\Models\Product;

class ProductController extends Controller
{
    private array $products;

    public function __construct()
    {
        $this->products = [
            1 => [
                'name' => 'product1',
                'price' => 400,
                'quantity' => 2,
                'category' => 'category1',
            ],
            2 => [
                'name' => 'product2',
                'price' => 100,
                'quantity' => 2,
                'category' => 'category2',
            ],
            3 => [
                'name' => 'product3',
                'price' => 646,
                'quantity' => 1,
                'category' => 'category3',
            ],
            4 => [
                'name' => 'product4',
                'price' => 420,
                'quantity' => 8,
                'category' => 'category4',
            ],
            5 => [
                'name' => 'product5',
                'price' => 150,
                'quantity' => 4,
                'category' => 'category4',
            ],
        ];
    }

    public function show(array $arguments): string
    {
        $this->title = 'Операция show контроллера product';

        $id = (int)$arguments["n"];

        // Проверка существования продукта
        if (!isset($this->products[$id])) {
            throw new \InvalidArgumentException("Product with id {$id} not found");
        }

        $value = $this->products[$id];

        return $this->render('product/show', [
            'value' => $value
        ]);
    }

    public function all(): string
    {
        $this->title = 'Опреация all контроллера product';
        return $this->render('product/all', ['products' => $this->products]);
    }

    public function one(array $param): string
    {
        $id = (int)$param['id'];
        $product = (new Product())->getById($id);

        $this->title = $product['title'];
        return $this->render('product/one', [
            'title' => $product['title'],
            'text' => $product['info']
        ]);
    }

    public function list(): string
    {
        $products = (new Product())->getAll();
        $this->title = "Список товаров";

        return $this->render('product/list', [
            'data' => $products,
            'title' => $this->title
        ]);
    }
}