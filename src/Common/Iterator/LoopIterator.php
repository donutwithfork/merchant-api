<?php

declare(strict_types=1);

namespace App\Common\Iterator;

use Iterator;

final class LoopIterator implements Iterator
{
    public function __construct(private array $array) {
    }

    function rewind() {
        reset($this->array);
    }

    function current() {
        return current($this->array);
    }

    function key() {
        return key($this->array);
    }

    function next() {
        next($this->array);
    }

    function valid() {
        return key($this->array) !== null;
    }
}
