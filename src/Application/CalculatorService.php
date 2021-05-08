<?php

namespace Company\Calculator\Application;

use Company\Calculator\Domain\Calculator;
use Company\Calculator\Domain\Exception\InvalidOperatorException;

class CalculatorService
{
    /**
     * calculate: fn to perform numeric calculation on two operands
     *
     * @param array $data
     * @return Calculator
     * @throws InvalidOperatorException
     */
    public function calculate(array $data): Calculator
    {
        $calculator = Calculator::build($data);
        $operator   = $calculator->operator;

        $calculator->result = match ($operator) {
            '+' => $calculator->left + $calculator->right,
            '-' => $calculator->left - $calculator->right,
            '*' => $calculator->left * $calculator->right,
            '/' => $calculator->left / $calculator->right,
            default => throw new InvalidOperatorException($operator),
        };

        return $calculator;
    }
}
