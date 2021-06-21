<?php


namespace App\Storage;


use App\Common\Checker\UniqueIdChecker;
use App\Common\Generators\DateTime\CurrentDateTimeFactory;
use App\Entity\Good;
use Doctrine\ORM\EntityManagerInterface;

class MerchantGoodStorage
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CurrentDateTimeFactory $currentDateTimeFactory,
        private UniqueIdChecker $uniqueIdChecker
    ) {
    }

    /**
     * найти все товары
     *
     * @return array
     */
    public function findAllGoods(): array
    {
        $goodList = $this->entityManager->getRepository(Good::class)
            ->findAll();

        return $goodList !== []
            ? $goodList
            : [];
    }

    /**
     * попытаться найти товар по данному sku
     *
     * @param string $sku
     * @return Good|null
     */
    public function findGoodBySku(string $sku): ?Good
    {
        /** @var Good|null $goodOrNull */
        $goodOrNull = $this->entityManager->getRepository(Good::class)
            ->findOneBy(['sku' => $sku]);

        if (isset($goodOrNull) && $goodOrNull != null) {
            return $goodOrNull;
        }
        else {
            return null;
        }
    }

    public function goodRemove(Good $good): void
    {
        $this->entityManager->remove($good);
        $this->entityManager->flush();
    }

    /**
     * сохранить хорошо
     *
     * @param Good $goodEntity
     */
    public function goodSave(Good $goodEntity): Good
    {
        $uniqueIdResult = $this->uniqueIdChecker->isUniqueIdReallyUnique($goodEntity->getUniqueId());
        if ($uniqueIdResult['newValue'] !== $goodEntity->getUniqueId())
        {
            $goodEntity->setUniqueId($uniqueIdResult['newValue']);
        }

        $goodEntity->setUpdatedAt($this->currentDateTimeFactory->createCurrentDateTime()->getDateTime());
        $this->entityManager->persist($goodEntity);
        $this->entityManager->flush();

        return $goodEntity;
    }
}