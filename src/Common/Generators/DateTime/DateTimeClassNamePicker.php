<?php

declare(strict_types=1);

namespace App\Common\Generators\DateTime;

use App\Common\Iterator\IteratorFactory;
use App\Common\Iterator\Worker\DateTimeClassNamePickerWorker;
use App\Common\Iterator\WorkerFactoryContext;

final class DateTimeClassNamePicker
{
    public function __construct(
        private IteratorFactory $iteratorFactory,
        private array $dateTimeClassNamePrioritizedList,
    ) {}

    public function pickAppropriateDateTimeClassName(int $targetPriority) : string
    {
        $targetDateTimeClassName = reset($this->dateTimeClassNamePrioritizedList);

        $workerFactoryContext = $this->getContext($targetPriority, $targetDateTimeClassName);
        $iterator = $this->iteratorFactory->getIterator($this->dateTimeClassNamePrioritizedList, $workerFactoryContext);
        $iterator->runLoop();

        return $iterator->getResult()['targetDateTimeClassName'];
    }

    private function getContext(int $targetPriority, $targetDateTimeClassName): WorkerFactoryContext
    {
        return new WorkerFactoryContext(
            DateTimeClassNamePickerWorker::class,
            ['targetPriority' => $targetPriority],
            ['targetDateTimeClassName' => $targetDateTimeClassName]
        );

    }
}