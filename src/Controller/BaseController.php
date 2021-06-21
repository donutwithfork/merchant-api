<?php

declare(strict_types=1);

namespace App\Controller;

use App\Common\Converters\Types\Common\ToJsonConverter;
use App\Common\Loader\ClassLoader;
use App\Common\Models\GoodModel;
use App\Common\Models\SearchCriteria;
use App\Dto\DtoFactory;
use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\ResolverInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public function __construct(
        protected ToJsonConverter $jsonConverter
    ) {
    }

    protected function buildInternalRequest(
        string $operation,
        ?GoodModel $model = null,
        ?string $sku = null
    ): InternalRequest
    {
        return DtoFactory::createRequest($operation, $model, $sku);
    }

}
