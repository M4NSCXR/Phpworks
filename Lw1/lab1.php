<?php

class Calculator
{
    private $result = 0, $var;

    public function sum(float $var)
    {
        $this->result += $var;
        return $this;
    }

    public function minus(float $var)
    {
        $this->result -= $var;
        return $this;
    }

    public function product(float $var)
    {
        $this->result *= $var;
        return $this;
    }

    public function division(float $var)
    {
        if ($var == 0) {
            throw new Exception("На ноль не делится (Exception)");
        } else {
            $this->result /= $var;
            return $this;
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}

$calculator = new Calculator();

try {
    //print("1) ". $calculator->sum(1)->sum(2)->product(3)->division(3)->getResult());
    //print("2) ". $calculator->sum(3)->sum(3)->minus(3)->division(3)->getResult());
    //print("3) ". $calculator->sum(1.4)->sum(2.6)->product(4)->getResult());
    print("4) " . $calculator->sum(2)->product(3)->division(0)->getResult());
} catch (Exception $e) {
    print($e->getMessage());
}