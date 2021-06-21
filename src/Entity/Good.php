<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="dvapay.good")
 *
 */
class Good extends BaseEntity
{
    /**
     * Unique ID (using UUID)
     *
     * @var string
     *
     * @ORM\Id()
     * @ORM\Column(type="string", nullable=false)
     */
    private string $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sku", type="string", nullable=false)
     */
    private string $sku;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false)
     */
    private string $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private string $type;

    /**
     * @var string
     *
     * @ORM\Column(name="cost_value", type="string", nullable=false)
     */
    private string $costValue;

    /**
     * @var bool
     *
     * @ORM\Column(name="enable", type="boolean", nullable=false)
     */
    private bool $enable = false;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private DateTime $createdAt;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    public DateTime $updatedAt;

    public function __construct()
    {
        $this->enable = true;
    }

    public function getUniqueId(): string
    {
        return $this->id;
    }

    public function setUniqueId(string $uniqueId): Good
    {
        $this->id = $uniqueId;
        return $this;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): Good
    {
        $this->sku = $sku;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Good
    {
        $this->name = $name;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): Good
    {
        $this->type = $type;
        return $this;
    }

    public function getCostValue(): string
    {
        return $this->costValue;
    }

    public function setCostValue(string $costValue): Good
    {
        $this->costValue = $costValue;
        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): Good
    {
        $this->id = $id;
        return $this;
    }

    public function isEnable(): bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): Good
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): Good
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): Good
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
}
