<?php
require_once '56.php';

class Interval
{
    private Date $date1;
    private Date $date2;

    public function __construct(Date $date1, Date $date2)
    {
        $this->date1 = $date1;
        $this->date2 = $date2;
    }

    public function toDays(): int
    {
        return (int)($this->timestampDiff() / 60 / 60 / 24);
    }

    public function toMonths(): int
    {
        return (int)round($this->timestampDiff() / 60 / 60 / 24 / 30);
    }

    public function toYears(): int
    {
        return abs($this->date1->getYear() - $this->date2->getYear());
    }

    private function timestampDiff(): int
    {
        $date1 = mktime(0, 0, 0, $this->date1->getMonth(), $this->date1->getDay(), $this->date1->getYear());
        $date2 = mktime(0, 0, 0, $this->date2->getMonth(), $this->date2->getDay(), $this->date2->getYear());
        return abs($date2 - $date1);
    }
}

$date1 = new Date('2003-12-19');
$date2 = new Date('2025-08-24');

$interval = new Interval($date1, $date2);

echo $interval->toDays() . "<br>";
echo $interval->toMonths() . "<br>";
echo $interval->toYears();