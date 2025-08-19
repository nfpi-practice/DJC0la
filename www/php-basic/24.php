<?php
class Arr
{
    private $numbers = [];
    private $sumHelper;
    private $avgHelper;
    public function __construct($numbers)
    {
        $this->numbers = $numbers;
        $this->sumHelper = new SumHelper();
        $this->avgHelper = new AvgHelper();
    }
    public function add($number)
    {
        $this->numbers = $number;
    }
    public function getSum23()
    {
        return $this->sumHelper->getSum2($this->numbers) + $this->sumHelper->getSum3($this->numbers);
    }

    public function getAvgMeanSum()
    {
        return $this->avgHelper->getAvg($this->numbers) + $this->avgHelper->getMeanSquare($this->numbers);
    }
}

class SumHelper
{
    public function getSum2($arr)
    {
        return $this->getSum($arr, 2);
    }
    public function getSum3($arr)
    {
        return $this->getSum($arr, 3);
    }
    private function getSum($arr, $power)
    {
        $sum = 0;
        foreach ($arr as $number) {
            $sum += pow($number,$power);
        }
        return $sum;
    }
}

class AvgHelper
{
    public function getAvg($arr)
    {
        return array_sum($arr) / count($arr);
    }
    public function getMeanSquare($arr)
    {
        $sum = 0;
        foreach ($arr as $number) {
            $sum += pow($number, 2);
        }
        return pow($sum/count($arr), 1/2);
    }
}

print_r((new Arr([1,2,3]))->getSum23() . " " . (new Arr([1,2,3]))->getAvgMeanSum());