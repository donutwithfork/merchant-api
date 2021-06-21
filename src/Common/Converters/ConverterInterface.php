<?php

declare(strict_types=1);

namespace App\Common\Converters;

interface ConverterInterface
{
    public function convert($data);
}