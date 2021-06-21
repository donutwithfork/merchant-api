<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Converters\ConverterInterface;

final class GoodShortConverter implements ConverterInterface
{
    public function __construct(
        private GoodEntityToModelConverter $toModelConverter,
        private GoodModelToIdArrayConverter $toIdArrayConverter
    ) {
    }

    public function convert($data)
    {
        $model = $this->toModelConverter->convert($data);

        return $this->toIdArrayConverter->convert($model);
    }
}