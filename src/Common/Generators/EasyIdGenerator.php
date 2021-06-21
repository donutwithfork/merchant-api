<?php

declare(strict_types=1);

namespace App\Common\Generators;

use JetBrains\PhpStorm\Pure;

final class EasyIdGenerator implements GeneratorInterface
{
    #[Pure]
    public static function generate(): string
    {
        return uniqid();
    }
}