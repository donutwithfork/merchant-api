<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model\DateTime;


use App\Common\Generators\DateTime\Model\DateDecoratorFactoryInterface;
use App\Common\Generators\DateTime\Model\DateTimeInterface;
use App\Common\Generators\DateTime\Model\TimeStampFactory;

final class DateTimeDecoratorFactory implements DateDecoratorFactoryInterface
{
    public function __construct(private DateTimeFactory $dateTimeFactory, private TimeStampFactory $timeStampFactory)
    {
    }

    final public function create(string $dateTimeAlias): DateTimeInterface
    {
        return new DateTimeDecorator(
            $this->dateTimeFactory->createDateTime($dateTimeAlias),
            $this->timeStampFactory->createTimeStamp()
        );
    }
}