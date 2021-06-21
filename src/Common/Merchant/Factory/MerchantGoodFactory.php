<?php

declare(strict_types=1);

namespace App\Common\Merchant\Factory;

use App\Common\Models\GoodModel;

class MerchantGoodFactory
{
    public function getGoodModel(array $data): GoodModel
    {
        $model = new GoodModel(
            sku: $data['sku'],
            name: $data['name'],
            type: $data['type'],
            costValue: $data['costValue']
        );
        if (isset($data['uniqueId']))
        {
            $model->uniqueId = $data['uniqueId'];
        }

        return $model;
    }
}
