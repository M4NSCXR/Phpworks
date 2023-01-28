<?php

class Date
{
    private $day;
    private $month;
    private $year;

    public function __construct($day, $month, $year)
    {
        if (checkdate($month, $day, $year)) {
            $this->day = $day;
            $this->month = $month;
            $this->year = $year;
        } else {
            throw new Exception("Неверный формат даты");
        }
    }

    public function diffDay(Date $secondDate) : string
    {
        $firstDate = date_create("{$this->year}-{$this->month}-{$this->day}");
        $secondDate = date_create("{$secondDate->getYear()}-{$secondDate->getMonth()}-{$secondDate->getDay()}");
        $difference = date_diff($firstDate, $secondDate)->format('%a');

        return $difference;
    }

    public function minusDay(int $daysToSubtract) : string
    {
        $date = new DateTime("{$this->year}-{$this->month}-{$this->day}");
        $intervalToSubtract = new DateInterval("P{$daysToSubtract}D");

        return $date->sub($intervalToSubtract)->format('d-m-Y');
    }

    public function getDateOfWeek() : string
    {
        $date = new DateTime("{$this->year}-{$this->month}-{$this->day}");
        $week = [
            'Воскресенье', 'Понедельник ', 'Вторник ', 'Среда ', 'Четверг ',
            'Пятница ', 'Суббота '
        ];
        return $week[intval($date->format('w'))];
    }

    public function format(string $format) : string
    {
        switch ($format) {
            case 'ru':
                return "{$this->day}-{$this->month}-{$this->year}";
                break;

            case 'en':
                return "{$this->year}-{$this->month}-{$this->day}";
                break;

            default:
                throw new Exception("Неверный формат");
                break;
        }
    }

    public function getDay() : int
    {
        return $this->day;
    }

    public function getMonth() : int
    {
        return $this->month;
    }

    public function getYear() : int
    {
        return $this->year;
    }
}

$first = readline("Введите первую дату (дд.мм.гггг): ");
$second = readline("Введите вторую дату (дд.мм.гггг): ");

if (ctype_digit(substr($first, 0, 2)) && ctype_digit(substr($first, 3, 2)) && ctype_digit(substr($first, 6, 4))
    && ctype_digit(substr($second, 0, 2)) && ctype_digit(substr($second, 3, 2)) && ctype_digit(substr($second, 6, 4))) {
    $firstDate = new Date(substr($first, 0, 2), substr($first, 3, 2), substr($first, 6, 4));
    $secondDate = new Date(substr($second, 0, 2), substr($second, 3, 2), substr($second, 6, 4));

    print("{$firstDate->diffDay($secondDate)} \n");
    print("{$firstDate->minusDay(4)} \n");
    print("{$firstDate->getDateOfWeek()} \n");
    print("{$firstDate->format('ru')} \n");
    print("{$firstDate->format('en')} \n");
} else {
    print("Ошибка в вводе");
    exit(1);
}