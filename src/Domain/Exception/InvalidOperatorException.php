<?php

namespace Company\Calculator\Domain\Exception;

use Exception;

class InvalidOperatorException extends Exception
{
    /**
     * InvalidOperatorException constructor.
     * @param string $operator
     */
    public function __construct(string $operator)
    {
        parent::__construct("$operator is an invalid operator");
    }
}
