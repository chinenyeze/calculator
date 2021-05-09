<?php

namespace Tests\Unit\Framework\Validator\Calculator;

use Company\Calculator\Framework\Validator\Calculator\PostCalculateValidator;
use Tests\Unit\AbstractTestCase;

class PostCalculateValidatorTest extends AbstractTestCase
{
    protected PostCalculateValidator $postCalculateValidator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->postCalculateValidator = new PostCalculateValidator();
    }

    public function testValidate(): void
    {
        $this->request->method('getParsedBody')
            ->willReturn(self::$calculatorData);

        $actual = $this->postCalculateValidator->validate($this->request);

        self::assertEquals(self::$calculatorData, $actual);
    }
}
