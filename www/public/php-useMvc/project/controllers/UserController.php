<?php

namespace Project\Controllers;

use Core\Controller;

class UserController extends Controller
{
    private array $users;

    public function __construct()
    {
        $this->users = [
            1 => ['name' => 'user1', 'age' => '23', 'salary' => 1000],
            2 => ['name' => 'user2', 'age' => '24', 'salary' => 2000],
            3 => ['name' => 'user3', 'age' => '25', 'salary' => 3000],
            4 => ['name' => 'user4', 'age' => '26', 'salary' => 4000],
            5 => ['name' => 'user5', 'age' => '27', 'salary' => 5000],
        ];
    }

    public function show(array $param): void
    {
        $this->title = 'Операция show контроллера user';

        if (!isset($param['id'])) {
            throw new \InvalidArgumentException('User ID parameter is required');
        }

        $id = (int)$param['id'];

        if (!isset($this->users[$id])) {
            throw new \InvalidArgumentException("User with ID {$id} not found");
        }

        var_dump($this->users[$id]);
    }

    public function info(array $params): void
    {
        $this->title = 'Операция info контроллера user';

        if (!isset($params['id']) || !isset($params['key'])) {
            throw new \InvalidArgumentException('Both ID and key parameters are required');
        }

        $id = (int)$params['id'];
        $key = $params['key'];

        if (!isset($this->users[$id])) {
            throw new \InvalidArgumentException("User with ID {$id} not found");
        }

        if (!isset($this->users[$id][$key])) {
            throw new \InvalidArgumentException("Key '{$key}' not found for user with ID {$id}");
        }

        print_r($this->users[$id][$key]);
    }

    public function all(): void
    {
        $this->title = 'Операция all контроллера user';
        var_dump($this->users);
    }

    public function first(array $param): void
    {
        $this->title = 'Операция first контроллера user';

        if (!isset($param['count'])) {
            throw new \InvalidArgumentException('Count parameter is required');
        }

        $count = (int)$param['count'];

        if ($count < 1 || $count > count($this->users)) {
            throw new \InvalidArgumentException("Count must be between 1 and " . count($this->users));
        }

        for ($i = 1; $i <= $count; $i++) {
            var_dump($this->users[$i]);
        }
    }
}