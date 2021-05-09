<?php

namespace Company\Calculator\Domain;

use JsonSerializable;

class Calculator implements JsonSerializable
{
    /**
     * Supported operators
     * @var array
     */
    public static array $operators = ['+', '-', '/', '*'];

    /**
     * Calculator constructor.
     * @param float $left operand
     * @param float $right operand
     * @param string $operator
     * @param float|null $result
     */
    public function __construct(
        public float $left,
        public float $right,
        public string $operator,
        public ?float $result,
    ) {
    }

    /**
     * @param array $data
     * @return static
     */
    public static function build(array $data): self
    {
        return new self(
            $data['left'],
            $data['right'],
            $data['operator'],
            $data['result'] ?? null
        );
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'left'     => $this->left,
            'right'    => $this->right,
            'operator' => $this->operator,
            'result'   => $this->result,
        ];
    }
}
