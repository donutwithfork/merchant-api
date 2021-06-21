<?php

declare(strict_types=1);

namespace App\Service\Good;

use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\BaseService;
use App\Service\Good\Cache\ListCacheUpdater;
use App\Service\ServiceInterface;
use App\Storage\MerchantGoodStorage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class Delete extends BaseService implements ServiceInterface
{
    public function __construct(
        private MerchantGoodStorage $goodStorage,
        private ListCacheUpdater $cacheUpdater
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        $good = $this->goodStorage->findGoodBySku($dto->getSearchCriteria()->getSku());

        if ($good === null) {
            throw new NotFoundHttpException('good not found', null, 404);
        }

        $this->goodStorage->goodRemove($good);
        $this->cacheUpdater->invalidate();

        return $this->getInternalResult(true);
    }
}