<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime;


final class CurrentAliasDateTimeFactory
{
    public function __construct(private string $currentDateTimeAlias) {}

    final public function createCurrentDateTimeAlias() : string
    {
        return $this->currentDateTimeAlias;
    }
}