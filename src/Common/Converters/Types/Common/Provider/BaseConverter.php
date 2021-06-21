<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Common\Provider;

use App\Common\Converters\ConverterInterface;
use App\Common\Converters\Types\Common\ToIntConverter;
use App\Common\Converters\Types\Common\ToStringConverter;

class BaseConverter
{
    protected ConverterInterface $converter;

    private const CONVERTER_MAP = [
        'convertToInt' => ToIntConverter::class,
        'convertToString' => ToStringConverter::class,
    ];

    public function __call($name, $arguments)
    {
        if (array_key_exists($name, self::CONVERTER_MAP)) {
            $converterClass = self::CONVERTER_MAP[$name];
            $this->converter = new $converterClass();

            return $this->converter->convert($arguments[0]);
        }

        throw new \Exception('Converter not found');
    }

    public function __construct(protected $value = null)
    {
    }
}
