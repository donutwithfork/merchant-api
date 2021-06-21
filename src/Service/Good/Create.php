<?php

declare(strict_types=1);

namespace App\Service\Good;

use App\Common\Converters\GoodConverterResolver;
use App\Common\Converters\Types\Good\GoodModelToEntityConverter;
use App\Common\Merchant\Exception\DuplicateSkuException;
use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\BaseService;
use App\Service\Good\Cache\ListCacheUpdater;
use App\Service\ServiceInterface;
use App\Storage\MerchantGoodStorage;

final class Create extends BaseService implements ServiceInterface
{

    public function __construct(
        private MerchantGoodStorage $goodStorage,
        private GoodModelToEntityConverter $modelToEntityConverter,
        private GoodConverterResolver $goodConverterResolver,
        private ListCacheUpdater $cacheUpdater
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        $goodEntity = $this->modelToEntityConverter->convert($dto->getModel());

        if ($this->goodStorage->findGoodBySku($dto->getModel()->sku) !== null)
        {
            throw new DuplicateSkuException();
        }

        $goodEntity = $this->goodStorage->goodSave($goodEntity);

        $this->cacheUpdater->invalidate();

        return $this->getInternalResult($this->goodConverterResolver->getShort()->convert($goodEntity));
    }
}