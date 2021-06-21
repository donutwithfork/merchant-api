<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\InternalRequest;
use App\Dto\InternalResult;

interface ServiceInterface
{
    public function behave(InternalRequest $dto): InternalResult;
}