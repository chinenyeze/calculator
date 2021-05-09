<?php

namespace Tests\Unit\Framework\Controller\Calculator;

use Company\Calculator\Domain\Exception\InvalidOperatorException;
use Company\Calculator\Framework\Controller\Calculator\PostCalculate;
use Company\Calculator\Framework\Validator\Calculator\PostCalculateValidator;
use Exception;
use Tests\Unit\AbstractTestCase;

class PostCalculateTest extends AbstractTestCase
{
    protected PostCalculate $postCalculate;
    protected PostCalculateValidator $postCalculateValidator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->postCalculateValidator = $this->createMock(PostCalculateValidator::class);
        $this->postCalculateValidator->method('validate')
            ->willReturn(self::$calculatorData);

        $this->postCalculate = new PostCalculate($this->calculatorService, $this->postCalculateValidator);
    }

    public function testResponse_202(): void
    {
        $payload         = $this->calculator;
        $payload->result = 15.0;

        $this->calculatorService->method('calculate')
            ->willReturn($payload);

        $this->response->method('getStatusCode')
            ->willReturn(202);
        $this->response->method('getBody')
            ->willReturn(json_encode($payload));

        $this->response = $this->postCalculate->__invoke($this->request, $this->response);

        self::assertEquals(202, $this->response->getStatusCode());
        self::assertEquals(15.0, json_decode($this->response->getBody(), true)['result']);
    }

    public function testResponse_400(): void
    {
        $expected = [
            'error' => '# is an invalid operator',
        ];

        $this->calculatorService->method('calculate')
            ->willThrowException(new InvalidOperatorException('#'));

        $this->response->method('getStatusCode')
            ->willReturn(400);
        $this->response->method('getBody')
            ->willReturn(json_encode($expected));

        $this->response = $this->postCalculate->__invoke($this->request, $this->response);

        self::assertEquals(400, $this->response->getStatusCode());
        self::assertEquals($expected, json_decode($this->response->getBody(), true));
    }

    public function testResponse_500(): void
    {
        $expected = [
            'error' => 'Internal Server Error',
        ];

        $this->calculatorService->method('calculate')
            ->willThrowException(new Exception());

        $this->response->method('getStatusCode')
            ->willReturn(500);
        $this->response->method('getBody')
            ->willReturn(json_encode($expected));

        $this->response = $this->postCalculate->__invoke($this->request, $this->response);

        self::assertEquals(500, $this->response->getStatusCode());
        self::assertEquals($expected, json_decode($this->response->getBody(), true));
    }
}
