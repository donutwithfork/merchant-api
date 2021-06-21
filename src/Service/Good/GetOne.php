<?php

declare(strict_types=1);

namespace App\Service\Good;

use App\Common\Converters\GoodConverterResolver;
use App\Common\Merchant\Exception\DuplicateSkuException;
use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\BaseService;
use App\Service\ServiceInterface;
use App\Storage\MerchantGoodStorage;

final class GetOne extends BaseService implements ServiceInterface
{
    public function __construct(
        private MerchantGoodStorage $goodStorage,
        private GoodConverterResolver $goodConverterResolver
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        $good = $this->goodStorage->findGoodBySku($dto->getSearchCriteria()->getSku());

        return $this->getInternalResult($this->goodConverterResolver->getFull()->convert($good));
    }
}