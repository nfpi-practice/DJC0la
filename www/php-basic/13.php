<?php
class Arr
{
    private $numbers = [];
    public function add(array $numbers)
    {
        $this->numbers = array_merge($this->numbers, $numbers);
    }
    public function getSum()
    {
        return array_sum($this->numbers);
    }
    public function getAvg()
    {
        return array_sum($this->numbers) / count($this->numbers);
    }
}

$arr = new Arr();
$arr->add([1, 2, 3]);
$arr->add([6]);
print_r("Sum: {$arr->getSum()}\nAverage: {$arr->getAvg()}");