<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model\Carbon;


use App\Common\Generators\DateTime\Model\DateTimeInterface;
use App\Common\Generators\DateTime\Model\DateDecoratorFactoryInterface;
use App\Common\Generators\DateTime\Model\TimeStampFactory;
use JetBrains\PhpStorm\Pure;

final class CarbonDecoratorFactory implements DateDecoratorFactoryInterface
{
    public function __construct(private CarbonFactory $carbonFactory, private TimeStampFactory $timeStampFactory)
    {
    }

    #[Pure] final public function create(string $dateTimeAlias): DateTimeInterface
    {
        return new CarbonDecorator(
            $this->carbonFactory->createCarbon($dateTimeAlias),
            $this->timeStampFactory->createTimeStamp()
        );
    }
}