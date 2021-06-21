<?php

declare(strict_types=1);


namespace App\Common\Converters\Types\Common;


final class ToIntConverter implements ToIntConverterInterface
{
    public function convert($data): int
    {
        return (int) $data;
    }
}