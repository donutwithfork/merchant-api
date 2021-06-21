<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model\Carbon;


use Carbon\Carbon;
use JetBrains\PhpStorm\Pure;

final class CarbonFactory
{
    #[Pure] final public function createCarbon(string $dateTimeAlias): Carbon
    {
        return new Carbon($dateTimeAlias);
    }
}