<?php


namespace App\Common\Converters\Types\Good;


use App\Common\Converters\ConverterInterface;
use App\Common\Models\GoodModel;

interface ToModelConverterInterface extends ConverterInterface
{
    public function convert($data): GoodModel;
}