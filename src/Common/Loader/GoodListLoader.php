<?php

declare(strict_types=1);

namespace App\Common\Loader;

use App\Common\Decoders\JsonDecoder;
use App\Dto\DtoFactory;
use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\Good\GetList;

final class GoodListLoader extends GetList
{
    public function __construct(
        private GetList $inner,
        private JsonDecoder $jsonDecoder
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        if (!$this->isValid()) {
            return $this->inner->behave($dto);
        }
        $result = $this->getList();
        return DtoFactory::createResult($result, null);
    }

    private function isValid():bool
    {
        $pdo = new \PDO($_ENV['DATABASE_URL'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
        $stmt = $pdo->prepare('SELECT count(id) as cnt FROM cache_good_list WHERE active = 1');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result[0]['cnt'] > 0;
    }

    private function getList(): array
    {
        $pdo = new \PDO($_ENV['DATABASE_URL'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
        $stmt = $pdo->prepare('SELECT value FROM cache_good_list WHERE active = 1');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];
        return $this->jsonDecoder->decode($result['value']);
    }
}