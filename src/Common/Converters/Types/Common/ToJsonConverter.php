<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Common;

use App\Common\Converters\ConverterInterface;

final class ToJsonConverter implements ConverterInterface
{
    public function convert($data)
    {
        return json_encode($data);
    }
}