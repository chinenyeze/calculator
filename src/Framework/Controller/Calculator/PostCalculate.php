<?php

namespace Company\Calculator\Framework\Controller\Calculator;

use Company\Calculator\Application\CalculatorService;
use Company\Calculator\Domain\Exception\InvalidOperatorException;
use Company\Calculator\Framework\Validator\ValidatorInterface;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Exceptions\ValidationException;

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

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        try {
            $data    = $this->validator->validate($request);
            $payload = $this->calculatorService->calculate($data);
            $status  = 202;
        } catch (InvalidOperatorException | ValidationException $e) {
            $payload = [
                'error' => $e->getMessage(),
            ];
            $status  = 400;
        } catch (Exception) {
            $payload = [
                'error' => 'Internal Server Error',
            ];
            $status  = 500;
        }

        return $response->withJson($payload, $status);
    }
}
