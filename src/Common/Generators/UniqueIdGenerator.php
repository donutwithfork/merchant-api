<?php

declare(strict_types=1);

namespace App\Common\Generators;

use Ramsey\Uuid\Uuid;

final class UniqueIdGenerator implements GeneratorInterface
{
    public static function generate(): string
    {
        $generator = new self();

        return $generator->realGenerate();
    }

    protected function realGenerate(): string
    {
        $uuid = Uuid::uuid4();

        return $uuid->toString();
    }
}