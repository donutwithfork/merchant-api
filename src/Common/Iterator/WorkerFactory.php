<?php

declare(strict_types=1);

namespace App\Common\Iterator;

use App\Common\Converters\Types\Good\GoodFullConverter;
use App\Common\Iterator\Exception\WorkerNotFound;
use App\Common\Iterator\Worker\DateTimeClassNamePickerWorker;
use App\Common\Iterator\Worker\GoodListWorker;
use App\Common\Iterator\Worker\IteratorWorkerInterface;

final class WorkerFactory
{

    public function __construct(private GoodFullConverter $goodConverter)
    {
    }

    public function __call(string $name, array $arguments)
    {
        if ($name == 'getWorker') {
            return $this->getWorker($arguments[0]);
        }

        return false;
    }

    protected function getWorker(WorkerFactoryContext $context): IteratorWorkerInterface
    {
        switch ($context->getClass())
        {
            case DateTimeClassNamePickerWorker::class:
                return $this->getDateTimeClassNamePickerWorker($context->getArguments(), $context->getMutableArguments());
            case GoodListWorker::class:
                return $this->getGoodListWorker($context->getMutableArguments());
        }

        throw new WorkerNotFound($context->getClass());
    }

    private function getDateTimeClassNamePickerWorker(array $arguments, array $mutableArguments)
    {
        return new DateTimeClassNamePickerWorker(
            $arguments['targetPriority'],
            $mutableArguments['targetDateTimeClassName']
        );
    }

    private function getGoodListWorker(array $mutableArguments)
    {
        return new GoodListWorker(
            $this->goodConverter,
            $mutableArguments['result'],
        );
    }
}
