<?php

declare(strict_types=1);


namespace App\Common\Generators\DateTime;


use App\Common\Generators\DateTime\Model\DateTimeDecoratorArbitraryFactory;
use App\Common\Generators\DateTime\Model\DateTimeInterface;

class CurrentDateTimeFactory
{
    const CURRENT_DATETIME_CLASS_PRIORITY = 2; // TODO по идее это немного грязно, нужно вынести эту логику в новую абстракцию

    public function __construct(
        private DateTimeDecoratorArbitraryFactory $dateTimeDecoratorArbitraryFactory,
        private CurrentAliasDateTimeFactory $currentAliasDateTimeGenerator,
        private DateTimeClassNamePicker $dateTimeClassNameFactory)
    {
    }

    public function createCurrentDateTime() : DateTimeInterface
    {
        $dateTimeDecoratorFactoryClassName = $this->dateTimeClassNameFactory->pickAppropriateDateTimeClassName(self::CURRENT_DATETIME_CLASS_PRIORITY);
        $dateTimeDecoratorFactory = $this->dateTimeDecoratorArbitraryFactory->createDecoratorFactory($dateTimeDecoratorFactoryClassName);

        $currentAliasDateTime = $this->currentAliasDateTimeGenerator->createCurrentDateTimeAlias();

        return $dateTimeDecoratorFactory->create($currentAliasDateTime);
    }
}