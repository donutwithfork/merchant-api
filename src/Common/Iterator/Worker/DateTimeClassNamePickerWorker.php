<?php

declare(strict_types=1);

namespace App\Common\Iterator\Worker;

final class DateTimeClassNamePickerWorker implements IteratorWorkerInterface
{
    public function __construct(
        private $targetPriority,
        private $targetDateTimeClassName
    ) {
    }

    public function behave($key, $value)
    {
        if ($this->targetPriority >= $key) {
            $this->targetDateTimeClassName = $value;
        }
    }

    public function getResult(): array
    {
        return ['targetDateTimeClassName' => $this->targetDateTimeClassName];
    }
}
