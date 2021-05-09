<?php

namespace Company\Calculator\Framework\Validator;

use Psr\Http\Message\ServerRequestInterface;
use Respect\Validation\Exceptions\ValidationException;

interface ValidatorInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return array
     * @throws ValidationException
     */
    public function validate(ServerRequestInterface $request): array;
}
