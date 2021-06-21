<?php

declare(strict_types=1);


namespace App\Common\Models;


use App\Common\Generators\GeneratorFactory;
use App\Common\Generators\GeneratorInterface;

class GoodModel
{

    public function __construct(
        public ?string $uniqueId = null,
        public ?string $sku = null,
        public ?string $name = null,
        public ?string $type = null,
        public ?string $costValue = null
    ) {
        /** @var GeneratorInterface $generator */
        $generator = GeneratorFactory::getGenerator(GeneratorFactory::UNIQUE);

        $this->uniqueId = $generator->generate();
    }
}
