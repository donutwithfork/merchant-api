<?php

declare(strict_types=1);

namespace App\Common\Converters;

use App\Common\Converters\Types\Common\Provider\FromIntConverter;
use App\Common\Converters\Types\Common\Provider\FromStringConverter;

final class DataTypesConverterResolver
{
    public const INT = 'integer';
    public const STRING = 'string';

    public function resolve($dataForConvert)
    {
        $fromType = gettype($dataForConvert);
        return match ($fromType) {
            self::INT => new FromIntConverter($dataForConvert),
            self::STRING => new FromStringConverter($dataForConvert),
            default => throw new \Exception('converter not found'),
        };
    }
}
