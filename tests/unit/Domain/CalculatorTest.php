<?php

namespace Tests\Unit\Domain;

use Company\Calculator\Domain\Calculator;
use Tests\Unit\AbstractTestCase;

class CalculatorTest extends AbstractTestCase
{
    public function testCalculator(): void
    {
        $data = self::$calculatorData;

        $calculator = new Calculator(
            $data['left'],
            $data['right'],
            $data['operator'],
            $data['result'],
        );

        self::assertEquals($data['left'], $calculator->left);
        self::assertEquals($data['right'], $calculator->right);
        self::assertEquals($data['operator'], $calculator->operator);
        self::assertEquals($data['result'], $calculator->result);

        $actualData = json_decode(json_encode($calculator), true);

        self::assertEquals($data, $actualData);
    }
}