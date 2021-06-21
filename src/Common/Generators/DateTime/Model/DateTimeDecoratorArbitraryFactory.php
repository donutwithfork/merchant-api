<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime\Model;


final class DateTimeDecoratorArbitraryFactory
{
    public function __construct(private array $decoratorFactories)
    {
    }

    public function createDecoratorFactory(string $decoratorFactoryName): DateDecoratorFactoryInterface
    {
        return $this->decoratorFactories[$decoratorFactoryName];
    }
}