<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\DtoFactory;
use App\Dto\InternalResult;

class BaseService
{
    protected function getInternalResult($result, $error = null): InternalResult
    {
        return DtoFactory::createResult($result, $error);
    }
}