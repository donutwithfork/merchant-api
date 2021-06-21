<?php

declare(strict_types=1);

namespace App\Service\Good;

use App\Common\Iterator\IteratorFactory;
use App\Common\Iterator\Worker\GoodListWorker;
use App\Common\Iterator\WorkerFactoryContext;
use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\BaseService;
use App\Service\Good\Cache\ListCacheUpdater;
use App\Service\ServiceInterface;
use App\Storage\MerchantGoodStorage;

class GetList extends BaseService implements ServiceInterface
{
    public function __construct(
        private MerchantGoodStorage $goodStorage,
        private IteratorFactory $iteratorFactory,
        private ListCacheUpdater $cacheUpdater
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        $goods = $this->goodStorage->findAllGoods();

        $result = [];
        $context = $this->getMerchantGoodListContext($result);
        $iterator = $this->iteratorFactory->getIterator($goods, $context);
        $iterator->runLoop();

        $result = $iterator->getResult();
        $this->cacheUpdater->insert($result);
        return $this->getInternalResult($result);
    }

    private function getMerchantGoodListContext(array $result): WorkerFactoryContext
    {
        return new WorkerFactoryContext(
            GoodListWorker::class,
            [],
            ['result' => $result]
        );
    }
}