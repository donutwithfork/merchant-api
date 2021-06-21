<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model;


use App\Common\Generators\DateTime\Converter\IntToStringConverter;
use DateTimeInterface as DateTimeInterface;

final class TimeStamp implements TimeStampInterface
{
    public function __construct(private IntToStringConverter $intToStringConverter)
    {
    }

    public function getStringTimestamp(DateTimeInterface $dateTime): string
    {
        return $this->intToStringConverter->convertIntToString($dateTime->getTimestamp());
    }
}