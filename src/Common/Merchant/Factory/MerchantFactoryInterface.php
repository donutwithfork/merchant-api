<?php


namespace App\Common\Merchant\Factory;


use App\Common\Models\GoodDbModel;

interface MerchantFactoryInterface
{
    public function getGood(array $data): GoodDbModel;
}
