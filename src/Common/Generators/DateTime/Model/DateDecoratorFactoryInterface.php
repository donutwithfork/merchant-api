<?php


namespace App\Common\Generators\DateTime\Model;


interface DateDecoratorFactoryInterface
{
    public function create(string $dateTimeAlias): DateTimeInterface;
}