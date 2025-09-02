<?php

namespace Core;

use mysqli;

class Model
{
    private static ?mysqli $link = null;

    public function __construct()
    {
        if (!self::$link) {
            self::$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if (!self::$link) {
                throw new \RuntimeException('Ошибка подключения к базе данных: ' . mysqli_connect_error());
            }
            mysqli_query(self::$link, "SET NAMES 'utf8'");
        }
    }

    protected function findOne(string $query): ?array
    {
        $result = mysqli_query(self::$link, $query);
        if (!$result) {
            throw new \RuntimeException('Ошибка запроса: ' . mysqli_error(self::$link));
        }
        return mysqli_fetch_assoc($result) ?: null;
    }

    protected function findMany(string $query): array
    {
        $result = mysqli_query(self::$link, $query);
        if (!$result) {
            throw new \RuntimeException('Ошибка запроса: ' . mysqli_error(self::$link));
        }

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }
}