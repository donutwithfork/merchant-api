<?php

declare(strict_types=1);


namespace App\Common\Iterator;


final class WorkerFactoryContext
{
    public function __construct(
      private string $class,
      private array $arguments,
      private array $mutableArguments
    ) {
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    public function setClass(string $class): WorkerFactoryContext
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function setArguments(array $arguments): WorkerFactoryContext
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @return array
     */
    public function getMutableArguments(): array
    {
        return $this->mutableArguments;
    }

    public function setMutableArguments(array $mutableArguments): WorkerFactoryContext
    {
        $this->mutableArguments = $mutableArguments;

        return $this;
    }
}
