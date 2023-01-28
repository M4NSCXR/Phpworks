<?php

echo "Calculatorik of time\n";

var_dump($argv);

echo sumTime($argv[1], $argv[2]);

function sumTime(string $first, string $second) : string
{
    $result = '';
    $seconds = '';
    $minute = '';
    $hour = '';
    $incrementalHour = 0;
    $incrementalMinute = 0;

    for ($i = 0; $i <= strlen($first); $i += 3) {
        if (is_numeric(substr($first, $i, 2)) === false || is_numeric(substr($second, $i, 2)) === false) {
            return("Неверный ввод...\n\n");
        }
    }

    //Подсчёт секунд
    if ((substr($first, 6, 2) + substr($second, 6, 2)) > 60) {
        if ((substr($first, 6, 2) + substr($second, 6, 2) - 60) < 10) {
            $seconds = $seconds . '0' . (substr($first, 6, 2) + substr($second, 6, 2) - 60);
        } else {
            $seconds = $seconds . '' . (substr($first, 6, 2) + substr($second, 6, 2) - 60);
        }
        $incrementalMinute += 1;
    } else {
        if ((substr($first, 6, 2) + substr($second, 6, 2)) < 10) {
            $seconds = $seconds . '0' . (substr($first, 6, 2) + substr($second, 6, 2));
        } else {
            $seconds = $seconds . '' . (substr($first, 6, 2) + substr($second, 6, 2));
        }
    }

    //Подсчёт минут
    if ((substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute) > 60) {
        if ((substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute - 60) < 10) {
            $minute = $minute . '0' . (substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute - 60);
        } else {
            $minute = $minute . '' . (substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute - 60);
        }
        $incrementalHour += 1;
    } else {
        if ((substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute) < 10) {
            $minute = $result . '0' . (substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute);
        } else {
            $minute = $result . '' . (substr($first, 3, 2) + substr($second, 3, 2) + $incrementalMinute);
        }
    }

    //Подсчёт часов
    if ((substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour) > 24) {
        if ((substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour - 24) < 10) {
            $hour = $result . '0' . (substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour - 24);
        } else {
            $hour = $result . '' . (substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour - 24);
        }
    } else {
        if ((substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour) < 10) {
            $hour = $result . '0' . (substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour);
        } else {
            $hour = $result . '' . (substr($first, 0, 2) + substr($second, 0, 2) + $incrementalHour);
        }
    }

    $result = $hour . ':' . $minute . ':' . $seconds;

    return $result;
}