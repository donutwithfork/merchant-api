<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model\DateTime;


final class DateTimeFactory
{
    final public function createDateTime(string $dateTimeAlias): \DateTime
    {
        return new \DateTime($dateTimeAlias);
    }
}