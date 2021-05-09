<?php

namespace Tests\Unit;

use Company\Calculator\Application\CalculatorService;
use Company\Calculator\Domain\Calculator;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Response;
use Slim\Psr7\Request;

abstract class AbstractTestCase extends TestCase
{
    protected Calculator $calculator;
    protected CalculatorService $calculatorService;
    protected Request $request;
    protected ResponseInterface $response;

    protected function setUp(): void
    {
        parent::setUp();

        $this->calculator = Calculator::build(self::$calculatorData);

        $this->calculatorService = $this->createMock(CalculatorService::class);

        $this->request = $this->createMock(Request::class);

        $this->response = $this->createMock(Response::class);
        $this->response->method('withStatus')
            ->willReturn($this->response);
        $this->response->method('withJson')
            ->willReturn($this->response);
    }

    protected static array $calculatorData = [
        'left'     => 10,
        'right'    => 5,
        'operator' => '+',
        'result'   => null,
    ];
}
