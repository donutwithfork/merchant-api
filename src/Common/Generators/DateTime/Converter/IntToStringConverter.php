<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Converter;


final class IntToStringConverter
{
    final public function convertIntToString(int $integer): string
    {
        return (string)$integer;
    }
}