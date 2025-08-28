<?php

class CookieShell
{
    public function set(string $name, string $value, int $time): void
    {
        setcookie($name, $value, time() + $time);
        $_COOKIE[$name] = $value;
    }

    public function get(string $name): ?string
    {
        return $_COOKIE[$name] ?? null;
    }

    public function del(string $name): void
    {
        if ($this->exists($name)) {
            setcookie($name, '', time());
            unset($_COOKIE[$name]);
        }
    }

    public function exists(string $name): bool
    {
        return isset($_COOKIE[$name]);
    }
}

$csh = new CookieShell;

if ($csh->exists('loginCount')) {
    $numb = $csh->get('loginCount');
    $csh->set('loginCount', (string)((int)$numb + 1), 3600 * 24);
} else {
    $csh->set('loginCount', '1', 3600 * 24);
}

print_r($csh->get('loginCount'));