<?php

namespace Tests\Unit\Application;

use Company\Calculator\Application\CalculatorService;
use Company\Calculator\Domain\Calculator;
use Company\Calculator\Domain\Exception\InvalidOperatorException;
use Company\Calculator\Domain\Exception\ZeroDivisionException;
use Tests\Unit\AbstractTestCase;

class CalculatorServiceTest extends AbstractTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->calculatorService = new CalculatorService();
    }

    public function testCalculate_Add(): void
    {
        $data = self::$calculatorData;

        $actual = $this->calculatorService->calculate($data);

        $expected         = Calculator::build($data);
        $expected->result = 15.0;

        self::assertEquals($expected, $actual);
    }

    public function testCalculate_Subtract(): void
    {
        $data             = self::$calculatorData;
        $data['operator'] = '-';

        $actual = $this->calculatorService->calculate($data);

        $expected         = Calculator::build($data);
        $expected->result = 5.0;

        self::assertEquals($expected, $actual);
    }

    public function testCalculate_Multiply(): void
    {
        $data             = self::$calculatorData;
        $data['operator'] = '*';

        $actual = $this->calculatorService->calculate($data);

        $expected         = Calculator::build($data);
        $expected->result = 50.0;

        self::assertEquals($expected, $actual);
    }

    public function testCalculate_Divide(): void
    {
        $data             = self::$calculatorData;
        $data['operator'] = '/';

        $actual = $this->calculatorService->calculate($data);

        $expected         = Calculator::build($data);
        $expected->result = 2.0;

        self::assertEquals($expected, $actual);
    }

    public function testCalculate_ZeroDivisionException(): void
    {
        $this->expectException(ZeroDivisionException::class);

        $data             = self::$calculatorData;
        $data['right']    = 0;
        $data['operator'] = '/';

        $this->calculatorService->calculate($data);
    }

    public function testCalculate_InvalidOperatorException(): void
    {
        $this->expectException(InvalidOperatorException::class);

        $data             = self::$calculatorData;
        $data['operator'] = '#';

        $this->calculatorService->calculate($data);
    }
}
