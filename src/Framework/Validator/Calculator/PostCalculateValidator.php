<?php

namespace Company\Calculator\Framework\Validator\Calculator;

use Company\Calculator\Framework\Validator\ValidatorInterface;
use Psr\Http\Message\ServerRequestInterface;

class PostCalculateValidator implements ValidatorInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return array
     */
    public function validate(ServerRequestInterface $request): array
    {
        // TODO: Implement validate() method.
    }
}
