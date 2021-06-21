<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Good;

use App\Common\Generators\DateTime\CurrentDateTimeFactory;
use App\Common\Models\GoodModel;
use App\Entity\Good;

final class GoodModelToEntityConverter implements ToEntityConverterInterface
{
    public function __construct(private CurrentDateTimeFactory $currentDateTimeFactory)
    {
    }

    /**
     * @param GoodModel $data
     * @return Good
     */
    public function convert($data): Good
    {
        return (new Good())
            ->setUniqueId($data->uniqueId)
            ->setName($data->name)
            ->setSku($data->sku)
            ->setType($data->type)
            ->setCostValue($data->costValue)
            ->setCreatedAt($this->currentDateTimeFactory->createCurrentDateTime()->getDateTime())
            ->setEnable(true)
        ;
    }
}