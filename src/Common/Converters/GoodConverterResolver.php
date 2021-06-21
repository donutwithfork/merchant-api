<?php

declare(strict_types=1);

namespace App\Common\Converters;

use App\Common\Converters\Types\Good\GoodFullConverter;
use App\Common\Converters\Types\Good\GoodShortConverter;

final class GoodConverterResolver
{
    public function __construct(
        private GoodShortConverter $goodShortConverter,
        private GoodFullConverter $goodFullConverter,
    ) {
    }

    public function getFull(): ConverterInterface
    {
        return $this->goodFullConverter;
    }

    public function getShort(): ConverterInterface
    {
        return $this->goodShortConverter;
    }
}