<?php

declare(strict_types=1);

namespace App\Common\Generators;

use App\Common\Generators\Exception\GeneratorNotFoundException;

final class GeneratorFactory
{
    public const EASY = 10;
    public const UNIQUE = 200;

    /**
     * @param int $type
     * @return GeneratorInterface
     * @throws GeneratorNotFoundException
     */
    public static function getGenerator(int $type): GeneratorInterface
    {
        return match ($type) {
            self::EASY => new EasyIdGenerator(),
            self::UNIQUE => new UniqueIdGenerator(),
            default => throw new GeneratorNotFoundException(),
        };
    }
}