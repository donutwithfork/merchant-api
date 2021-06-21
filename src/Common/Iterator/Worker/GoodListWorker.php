<?php

declare(strict_types=1);

namespace App\Common\Iterator\Worker;

use App\Common\Converters\Types\Good\GoodFullConverter;

final class GoodListWorker implements IteratorWorkerInterface
{
    public function __construct(
        private GoodFullConverter $goodConverter,
        private $result
    ) {
    }

    public function behave($key, $value)
    {
        $this->result[] = $this->goodConverter->convert($value);
    }

    public function getResult(): array
    {
        return ['result' => $this->result];
    }
}
