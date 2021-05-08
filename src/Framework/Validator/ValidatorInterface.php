<?php

namespace Company\Calculator\Framework\Validator;

use Psr\Http\Message\ServerRequestInterface;

interface ValidatorInterface
{
    /**
     * @param ServerRequestInterface $request
     * @return array
     */
    public function validate(ServerRequestInterface $request): array;
}
