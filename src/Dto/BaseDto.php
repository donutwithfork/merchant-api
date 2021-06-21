<?php

declare(strict_types=1);

namespace App\Dto;

class BaseDto
{
    public static $loaded = false;

    public static function isLoaded(): bool
    {
        return self::$loaded;
    }
}