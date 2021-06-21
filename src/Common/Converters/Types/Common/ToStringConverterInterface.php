<?php

declare(strict_types=1);

namespace App\Common\Converters\Types\Common;

use App\Common\Converters\ConverterInterface;

interface ToStringConverterInterface extends ConverterInterface
{
    public function convert($data): string;
}