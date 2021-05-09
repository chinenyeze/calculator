<?php

namespace Company\Calculator\Domain\Exception;

use Exception;

class ZeroDivisionException extends Exception
{
    /**
     * ZeroDivisionException constructor.
     */
    public function __construct()
    {
        parent::__construct('Cannot divide by zero');
    }
}
