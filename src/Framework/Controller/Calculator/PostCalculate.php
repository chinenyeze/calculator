<?php

namespace Company\Calculator\Framework\Controller\Calculator;

use Company\Calculator\Application\CalculatorService;
use Company\Calculator\Domain\Exception\InvalidOperatorException;
use Company\Calculator\Framework\Validator\ValidatorInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PostCalculate
{
    /**
     * PostCalculate constructor.
     * @param CalculatorService $calculatorService
     * @param ValidatorInterface $validator
     */
    public function __construct(
        public CalculatorService $calculatorService,
        public ValidatorInterface $validator,
    ) {
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data       = $this->validator->validate($request);
        try {
            $payload = $this->calculatorService->calculate($data);
        } catch (InvalidOperatorException $e) {
            $payload = [
                'message' => 'In'
            ];
        }
        return $response->withJson($payload, 202);
    }
}
