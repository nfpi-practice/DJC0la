<?php
class ArraySumHelper
{
    public function getAvg1($arr)
    {
        return $this->calcSqrt($this->getSum($arr, 1), 1);
    }

    public function getAvg2($arr)
    {
        return $this->calcSqrt($this->getSum($arr, 2), 2);
    }

    public function getAvg3($arr)
    {
        return $this->calcSqrt($this->getSum($arr, 3), 3);
    }

    public function getAvg4($arr)
    {
        return $this->calcSqrt($this->getSum($arr, 4), 4);
    }

    private function getSum($arr, $power)
    {
        $sum = 0;
        foreach ($arr as $value) {
            $sum += pow($value, $power);
        }
        return $sum;
    }

    private function calcSqrt($num, $power)
    {
        return pow($num, 1/$power);
    }
}


print_r((new ArraySumHelper())->getAvg3([2,3]));