<?php
class Num
{
    public static $num1;
    public static $num2;
}

Num::$num1 = 2;
Num::$num2 = 3;

print_r(Num::$num1 + Num::$num2 . "<br>");

class Num1
{
    private static $num1 = 2;
    private static $num2 = 3;
    public static function getSum()
    {
        return self::$num1 + self::$num2;
    }
}

print_r(Num1::getSum() . "<br>");

class Geometry
{
    private static $pi = 3.14;

    public static function getCircleSquare($radius)
    {
        return self::$pi * $radius * $radius;
    }

    public static function getCircleСircuit($radius)
    {
        return 2 * self::$pi * $radius;
    }

    public static function getCircleVolume($radius)
    {
        return 4/3 * self::$pi * $radius ** 3;
    }
}

print_r(Geometry::getCircleVolume(10));