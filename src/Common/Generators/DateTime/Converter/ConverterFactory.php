<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Converter;


use JetBrains\PhpStorm\Pure;

final class ConverterFactory
{
    #[Pure] final public function createIntToStringConverter(): IntToStringConverter
    {
        return new IntToStringConverter();
    }
}