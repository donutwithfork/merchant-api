<?php

declare(strict_types=1);


namespace App\Service\Good;


use App\Common\Converters\GoodConverterResolver;
use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\BaseService;
use App\Service\Good\Cache\ListCacheUpdater;
use App\Service\ServiceInterface;
use App\Storage\MerchantGoodStorage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class Update extends BaseService implements ServiceInterface
{
    public function __construct(
        private MerchantGoodStorage $goodStorage,
        private GoodConverterResolver $goodConverterResolver,
        private ListCacheUpdater $cacheUpdater
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        $model = $dto->getModel();
        $entity = $this->goodStorage->findGoodBySku($dto->getSearchCriteria()->getSku());

        if ($entity === null) {
            throw new NotFoundHttpException('good not found', null, 404);
        }

        $entity->setSku($model->sku);
        $entity->setName($model->name);
        $entity->setType($model->type);
        $entity->setCostValue($model->costValue);

        $this->goodStorage->goodSave($entity);

        $this->cacheUpdater->invalidate();

        return $this->getInternalResult($this->goodConverterResolver->getFull()->convert($entity));
    }
}
