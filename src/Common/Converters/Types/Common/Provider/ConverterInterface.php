<?php

namespace App\Common\Converters\Types\Common\Provider;

interface ConverterInterface
{
    public function convertToInt(): int;

    public function convertToString(): string;

}