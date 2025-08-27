<?php

class Validator
{
    public function isEmail(string $str): bool
    {
        return (bool)filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public function isDomain(string $str): bool
    {
        return (bool)filter_var($str, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME);
    }

    public function inRange(int $num, int $from, int $to): bool
    {
        return ($num >= $from && $num <= $to);
    }

    public function inLength(string $str, int $from, int $to): bool
    {
        $length = mb_strlen($str);
        return ($length >= $from && $length <= $to);
    }
}

$validator = new Validator();
print_r("mail@gmail.com: ");
var_dump($validator->isEmail('mail@gmail.com'));
print_r(" mail@mail: ");
var_dump($validator->isEmail("mail@mail"));

print_r("<br>domain.com: ");
var_dump($validator->isDomain('domain.com'));
print_r(" domain..com: ");
var_dump($validator->isDomain('domain..com'));

print_r("<br>9 in range 1..10: ");
var_dump($validator->inRange(9, 1, 10));
print_r(" 19 in range 1..10: ");
var_dump($validator->inRange(19, 1, 10));

print_r("<br>'hello' in range 1..10: ");
var_dump($validator->inLength('Hello!', 1, 10));
print_r(" 'helloooooooo' in range 1..10: ");
var_dump($validator->inLength('helloooooooo', 1, 10));