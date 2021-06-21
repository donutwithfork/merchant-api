<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Common\Provider;

final class FromStringConverter extends BaseConverter implements ConverterInterface
{
    public function convertToInt(): int
    {
        return (int) $this->value;
    }

    public function convertToString(): string
    {
        return (string) $this->value;
    }
}