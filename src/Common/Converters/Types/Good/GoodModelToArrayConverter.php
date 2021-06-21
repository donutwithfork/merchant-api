<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Models\GoodModel;
use JetBrains\PhpStorm\ArrayShape;

final class GoodModelToArrayConverter implements ToArrayConverterInterface
{
    /**
     * @param GoodModel $data
     * @return array
     */
    #[ArrayShape(
        [
            'id' => "null|string",
            'name' => "null|string",
            'sku' => "null|string",
            'type' => "null|string",
            'costValue' => "null|string"
        ]
    )]
    public function convert($data): array
    {
        return [
            'id' => $data->uniqueId,
            'name' => $data->name,
            'sku' => $data->sku,
            'type' => $data->type,
            'costValue' => $data->costValue,
        ];

    }
}