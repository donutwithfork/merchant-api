<?php

declare(strict_types=1);

namespace App\Common\Models;

final class SearchCriteria
{
    private string $sku;
    private string $id;

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): SearchCriteria
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): SearchCriteria
    {
        $this->id = $id;
        return $this;
    }
}
