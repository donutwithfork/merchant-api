<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Models\GoodModel;
use JetBrains\PhpStorm\ArrayShape;

final class GoodModelToIdArrayConverter implements ToArrayConverterInterface
{
    /**
     * @param GoodModel $data
     * @return array
     */
    #[ArrayShape(
        [
            'id' => "null|string",
        ]
    )]
    public function convert($data): array
    {
        return [
            'id' => $data->uniqueId,
        ];

    }
}