<?php
class Arr
{
    private $numbers;
    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }
    public function getSum()
    {
        return array_sum($this->numbers);
    }
}

echo (new Arr([1,2,3]))->getSum();