<?php

declare(strict_types=1);

namespace App\Common\Checker;

use App\Common\Generators\GeneratorFactory;
use App\Storage\UniqueIdStorage;

final class UniqueIdChecker
{
    public function __construct(
        private UniqueIdStorage $uniqueIdStorage
    ) {
    }

    public function isUniqueIdReallyUnique($value): array
    {
        $result = $this->prepareResult($value);

        $reallyUnique = $this->getUnique($result);

        $this->uniqueIdStorage->makeUniqueNonUnique($reallyUnique['newValue']);

        return $reallyUnique;
    }

    private function getUnique(array &$unit): array
    {
        if ($unit['success'] === 1) {
            return $unit;
        }

        $checkInDb = $this->uniqueIdStorage->getUniqueId($unit['newValue']);
        if ($checkInDb !== false)
        {
            $generator = GeneratorFactory::getGenerator(GeneratorFactory::UNIQUE);
            $unit['newValue'] = $generator->generate();
            return $this->getUnique($unit);
        } else {
            $unit['success'] = 1;
            return $unit;
        }
    }

    private function prepareResult(string $value):array
    {
        return [
            'success' => 0,
            'newValue' => $value,
        ];
    }
}