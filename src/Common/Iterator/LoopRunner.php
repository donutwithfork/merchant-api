<?php

declare(strict_types=1);

namespace App\Common\Iterator;

use App\Common\Iterator\Worker\IteratorWorkerInterface;

final class LoopRunner
{
    public function __construct(
        private LoopIterator $iterator,
        private IteratorWorkerInterface $worker
    ){
    }

    //тут что-то хотел доделать

    public function runLoop(): void
    {
        while ($this->iterator->valid()) {
            $this->worker->behave(
                $this->iterator->key(),
                $this->iterator->current(),
            );
            $this->iterator->next();
        }
    }

    public function getResult(): array
    {
        return $this->worker->getResult();
    }
}