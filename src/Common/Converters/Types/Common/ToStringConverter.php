<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Common;

final class ToStringConverter implements ToStringConverterInterface
{

    public function convert($data): string
    {
        return (string) $data;
    }
}