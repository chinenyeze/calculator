<?php

namespace Company\Calculator\Application;

use Company\Calculator\Domain\Calculator;
use Company\Calculator\Domain\Exception\InvalidOperatorException;
use Company\Calculator\Domain\Exception\ZeroDivisionException;

class CalculatorService
{
    /**
     * calculate: fn to perform numeric calculation on two operands
     *
     * @param array $data
     * @return Calculator
     * @throws InvalidOperatorException
     * @throws ZeroDivisionException
     */
    public function calculate(array $data): Calculator
    {
        $calculator = Calculator::build($data);
        $operator   = $calculator->operator;

        // Handle division by zero error
        if ($operator === '/' && $calculator->right === 0.0) {
            throw new ZeroDivisionException();
        }

        // Perform calculation using supported operators
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
