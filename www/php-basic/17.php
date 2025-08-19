<?php
class Arr
{
    private $numbers;
    public function add($number)
    {
        $this->numbers[] = $number;
        return $this;
    }
    public function push($number)
    {
        $this->numbers = array_merge($this->numbers, $number);
        return $this;
    }
    public function getSum()
    {
        return array_sum($this->numbers);
    }
}

print_r((new Arr)->add(1)->add(2)->push([3,4])->getSum());