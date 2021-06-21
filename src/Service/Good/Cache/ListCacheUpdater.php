<?php

declare(strict_types=1);

namespace App\Service\Good\Cache;

use App\Common\Converters\Types\Common\ToJsonConverter;

final class ListCacheUpdater
{
    public function __construct(
        private ToJsonConverter $jsonConverter
    ) {
    }

    public function invalidate(): void
    {
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare('UPDATE cache_good_list SET active = 0 WHERE active = 1');
        $stmt->execute();
    }

    public function insert(array $value): void
    {
        $this->invalidate();
        $pdo = $this->getPdo();
        $stmt = $pdo->prepare("INSERT INTO `cache_good_list` (`active`, `value`) VALUES ('1', ?);");
        $valueForDb = $this->jsonConverter->convert($value);
        $stmt->execute([$valueForDb]);
    }

    private function getPdo()
    {
        return new \PDO($_ENV['DATABASE_URL'], $_ENV['DATABASE_USER'], $_ENV['DATABASE_PASS']);
    }
}