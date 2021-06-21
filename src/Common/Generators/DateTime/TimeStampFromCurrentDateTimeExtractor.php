<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime;


final class TimeStampFromCurrentDateTimeExtractor
{
    /**
     * @var CurrentDateTimeFactory
     */
    private CurrentDateTimeFactory $currentDateTimeFactory;

    public function __construct(CurrentDateTimeFactory $currentDateTimeFactory)
    {
        $this->currentDateTimeFactory = $currentDateTimeFactory;
    }

    final public function getCurrentTimeStamp()
    {
        $currentDateTime = $this->currentDateTimeFactory->createCurrentDateTime();
        $currentTimeStamp = $currentDateTime->getTimestamp();

        return $currentTimeStamp;
    }
}