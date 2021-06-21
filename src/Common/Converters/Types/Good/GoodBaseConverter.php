<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Converters\ConverterInterface;

abstract class GoodBaseConverter implements ConverterInterface
{
    public function __construct(
        private ToModelConverterInterface $toModelConverter,
        private ToArrayConverterInterface $toArrayConverter
    ) {
    }

    public function convert($data)
    {
        $model = $this->toModelConverter->convert($data);

        return $this->toArrayConverter->convert($model);
    }
}