<?php

class SessionShell
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function set(string $name, mixed $value): void
    {
        $_SESSION[$name] = $value;
    }

    public function get(string $name): mixed
    {
        return $_SESSION[$name];
    }

    public function del(string $name): void
    {
        unset($_SESSION[$name]);
    }

    public function exists(string $name): bool
    {
        return isset($_SESSION[$name]);
    }

    public function destroy(): void
    {
        session_destroy();
    }
}

$session = new SessionShell();
$session->set('test1', '1');
$session->set('test2', '2');
$session->set('test3', '3');
print_r($_SESSION);
$session->del('test1');
print_r($_SESSION);
$session->destroy();