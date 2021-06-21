<?php


namespace App\Common\Generators\DateTime\Model;


interface TimeStampInterface
{
    public function getStringTimestamp(\DateTimeInterface $dateTime): string;
}