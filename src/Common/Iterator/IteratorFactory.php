<?php

declare(strict_types=1);

namespace App\Common\Iterator;

use App\Common\Converters\Types\Good\GoodFullConverter;
use JetBrains\PhpStorm\Pure;

final class IteratorFactory
{
    public function __construct(
       private GoodFullConverter $goodConverter
    ) {
    }

    #[Pure]
    public function getIterator(array $array, WorkerFactoryContext $context): LoopRunner
    {
        $loopIterator = new LoopIterator($array);

        $workerFactory = new WorkerFactory($this->goodConverter);
        $worker = $workerFactory->getWorker($context);

        return new LoopRunner($loopIterator, $worker);
    }
}
