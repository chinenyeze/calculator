<?php

namespace Company\Calculator\Framework\Validator\Calculator;

use Company\Calculator\Framework\Validator\ValidatorInterface;
use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Exceptions\ValidationException;
use Respect\Validation\Validator as v;

class PostCalculateValidator implements ValidatorInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return array
     * @throws ValidationException
     */
    public function validate(ServerRequestInterface $request): array
    {
        $params = $request->getParsedBody();

        v::arrayType()
            ->key('left', v::numericVal())
            ->key('right', v::numericVal())
            ->key('operator', v::stringVal())
            ->setName('payload')
            ->check($params);

        return $params;
    }
}
