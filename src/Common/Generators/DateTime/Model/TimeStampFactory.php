<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model;


use App\Common\Generators\DateTime\Converter\ConverterFactory;
use JetBrains\PhpStorm\Pure;

final class TimeStampFactory
{
    public function __construct(private ConverterFactory $converterFactory)
    {
    }

    #[Pure] final public function createTimeStamp() : TimeStamp
    {
        return new TimeStamp(
            $this->converterFactory->createIntToStringConverter()
        );
    }
}