<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Converters\ConverterInterface;

final class GoodFullConverter implements ConverterInterface
{
    public function __construct(
        private GoodEntityToModelConverter $toModelConverter,
        private GoodModelToArrayConverter $toArrayConverter
    ) {
    }

    public function convert($data)
    {
        $model = $this->toModelConverter->convert($data);

        return $this->toArrayConverter->convert($model);
    }
}