<?php

echo "Casual calculatorik\n";

echo calculator($argv[1]);

function calculator(string $variable): string
{
    $str = "0123456789+-*/";
    for ($i = 0; $i <= strlen($variable); $i++) {
        if (stristr($str, substr($variable, $i, 1)) === false) {
            return("Неверный ввод...\n\n");
        }
    }

    try {
        $result = eval('return '.$variable.';');
    }
    catch (\Throwable $e) {
        $result = 0;
    }

    return $result;
}