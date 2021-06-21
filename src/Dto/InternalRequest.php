<?php

declare(strict_types=1);

namespace App\Dto;

use App\Common\Models\GoodModel;
use App\Common\Models\SearchCriteria;

final class InternalRequest extends BaseDto
{
    public static $loaded = true;
    private string $operation;
    private ?SearchCriteria $searchCriteria;
    private GoodModel $model;

    public function getModel(): GoodModel
    {
        return $this->model;
    }

    public function setModel(GoodModel $model): InternalRequest
    {
        $this->model = $model;
        return $this;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): InternalRequest
    {
        $this->operation = $operation;
        return $this;
    }

    public function getSearchCriteria(): ?SearchCriteria
    {
        return $this->searchCriteria;
    }

    public function setSearchCriteria(SearchCriteria $searchCriteria): InternalRequest
    {
        $this->searchCriteria = $searchCriteria;
        return $this;
    }
}
