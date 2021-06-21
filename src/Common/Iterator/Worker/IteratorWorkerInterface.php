<?php

declare(strict_types=1);


namespace App\Common\Iterator\Worker;


interface IteratorWorkerInterface
{
    public function behave($key, $value);

    public function getResult(): array;
}