<?php


namespace App\Common\Converters\Types\Good;


use App\Common\Converters\ConverterInterface;

interface ToArrayConverterInterface extends ConverterInterface
{
    public function convert($data): array;
}