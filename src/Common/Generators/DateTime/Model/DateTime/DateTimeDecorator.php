<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model\DateTime;


use App\Common\Generators\DateTime\Model\DateTimeInterface;
use App\Common\Generators\DateTime\Model\TimeStampInterface;
use DateTime;

final class DateTimeDecorator implements DateTimeInterface
{
    public function __construct(private DateTime $dateTime, private TimeStampInterface $timeStamp)
    {
    }

    final public function getTimestamp(): string
    {
        return $this->timeStamp->getStringTimestamp($this->dateTime);
    }

    public function getDateTime(): DateTime
    {
        return $this->dateTime;
    }
}