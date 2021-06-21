<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model;

use DateTime;

interface DateTimeInterface
{
    public function getTimestamp(): string;

    public function getDateTime(): DateTime;
}