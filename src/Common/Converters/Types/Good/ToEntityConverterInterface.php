<?php


namespace App\Common\Converters\Types\Good;


use App\Common\Converters\ConverterInterface;
use App\Entity\Good;

interface ToEntityConverterInterface extends ConverterInterface
{
    public function convert($data): Good;
}