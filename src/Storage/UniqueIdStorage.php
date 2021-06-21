<?php

declare(strict_types=1);

namespace App\Storage;

use App\Common\Generators\DateTime\CurrentDateTimeFactory;
use App\Entity\UniqueId;
use Doctrine\ORM\EntityManagerInterface;

final class UniqueIdStorage
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private CurrentDateTimeFactory $currentDateTimeFactory,
    ) {
    }

    public function makeUniqueNonUnique(string $value): void
    {
        $entity = new UniqueId();
        $entity->setValue($value);
        $entity->setCreatedAt($this->currentDateTimeFactory->createCurrentDateTime()->getDateTime());

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function getUniqueId(string $value)
    {
        $id = $this->entityManager->getRepository(UniqueId::class)
            ->findOneBy(['value' => $value]);

        return $id !== null
            ? $id
            : false;
    }

}

