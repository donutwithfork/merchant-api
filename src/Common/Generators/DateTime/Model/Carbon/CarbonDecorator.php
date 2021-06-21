<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model\Carbon;


use App\Common\Generators\DateTime\Model\DateTimeInterface;
use App\Common\Generators\DateTime\Model\TimeStampInterface;
use Carbon\Carbon;

final class CarbonDecorator implements DateTimeInterface
{
    public function __construct(private Carbon $carbon, private TimeStampInterface $timeStamp)
    {
    }

    final public function getTimestamp(): string
    {
        return $this->timeStamp->getStringTimestamp($this->carbon);
    }

    public function getDateTime(): DateTime
    {
        return $this->carbon;
    }
}