<?php
namespace Project\Models;
use Core\Model;

class Page extends Model
{
    public function getById(int $id): ?array
    {
        $query = "SELECT * FROM page WHERE id = " . (int)$id;
        return $this->findOne($query);
    }

    public function getAll(): array
    {
        return $this->findMany("SELECT id, title FROM page");
    }

    public function getByRange(int $from, int $to): array
    {
        $from = (int)$from;
        $to = (int)$to;
        $query = "SELECT * FROM page WHERE id >= $from AND id <= $to";

        return $this->findMany($query);
    }
}