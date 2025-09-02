<?php

namespace Project\Models;

use Core\Model;

class Product extends Model
{
    public function getById(int $id): ?array
    {
        $query = "SELECT * FROM products WHERE id = " . $id;
        return $this->findOne($query);
    }

    public function getAll(): array
    {
        return $this->findMany("SELECT id, title FROM products");
    }
}