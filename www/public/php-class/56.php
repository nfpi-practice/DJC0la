<?php

class Date
{
    private int $day;
    private int $month;
    private int $year;
    private int $timestamp;

    public function __construct(?string $date = null)
    {
        if ($date === null) {
            $this->day = (int)date('d');
            $this->month = (int)date('n');
            $this->year = (int)date('Y');
            $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        } else {
            $this->day = (int)date('d', strtotime($date));
            $this->month = (int)date('n', strtotime($date));
            $this->year = (int)date('Y', strtotime($date));
            $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        }
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function getMonth(?string $lang = null): string
    {
        $ruMonths = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

        if ($lang === null) {
            return $this->month;
        } elseif ($lang === 'en') {
            return date('F', $this->timestamp);
        } elseif ($lang === 'ru') {
            return $ruMonths[$this->month - 1];
        }

        return $this->month;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getWeekDay(?string $lang = null): string
    {
        $ruWeekDays = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресение'];

        if ($lang === null) {
            return (int)date('N', $this->timestamp);
        } elseif ($lang === 'en') {
            return date('l', $this->timestamp);
        } elseif ($lang === 'ru') {
            return $ruWeekDays[date('N', $this->timestamp) - 1];
        }

        return date('N', $this->timestamp);
    }

    public function addDays(int $value): self
    {
        $this->day += $value;
        while ($this->day > (int)date('t', mktime(0, 0, 0, $this->month, 1, $this->year))) {
            $this->day -= (int)date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
            $this->month++;
            if ($this->month > 12) {
                $this->month = 1;
                $this->year++;
            }
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function subtractDays(int $value): self
    {
        $this->day -= $value;
        while ($this->day < 1) {
            $this->month--;

            if ($this->month < 1) {
                $this->month = 12;
                $this->year--;
            }
            $this->day += date('t', mktime(0, 0, 0, $this->month, 1, $this->year));
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function addMonths(int $value): self
    {
        $this->month += $value;
        while ($this->month > 12) {
            $this->month -= 12;
            $this->year++;
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function subtractMonths(int $value): self
    {
        $this->month -= $value;
        while ($this->month < 1) {
            $this->month += 12;
            $this->year--;
        }
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function addYears(int $value): self
    {
        $this->year += $value;
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function subtractYears(int $value): self
    {
        $this->year -= $value;
        $this->timestamp = mktime(0, 0, 0, $this->month, $this->day, $this->year);
        return $this;
    }

    public function format(string $format): string
    {
        return date($format, $this->timestamp);
    }

    public function __toString(): string
    {
        return $this->year . '-' . $this->month . '-' . $this->day;
    }
}