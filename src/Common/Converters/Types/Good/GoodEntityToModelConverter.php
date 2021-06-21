<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Models\GoodModel;
use App\Entity\Good;

final class GoodEntityToModelConverter implements ToModelConverterInterface
{
    /**
     * @param Good $data
     * @return GoodModel
     */
    public function convert($data): GoodModel
    {
        return new GoodModel(
            uniqueId: $data->getId(),
            sku: $data->getSku(),
            name: $data->getName(),
            type: $data->getType(),
            costValue: $data->getCostValue()
        );
    }
}