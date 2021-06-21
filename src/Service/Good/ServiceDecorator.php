<?php

declare(strict_types=1);

namespace App\Service\Good;

use App\Dto\InternalRequest;
use App\Dto\InternalResult;
use App\Service\ResolverInterface;
use App\Service\ServiceInterface;

final class ServiceDecorator implements ServiceInterface
{
    public function __construct(
        private Create $create,
        private Update $update,
        private GetOne $getOne,
        private GetList $getList,
        private Delete $delete
    ) {
    }

    public function behave(InternalRequest $dto): InternalResult
    {
        switch ($dto->getOperation()) {
            case ResolverInterface::OPERATION_CREATE:
                return $this->create->behave($dto);
            case ResolverInterface::OPERATION_UPDATE:
                return $this->update->behave($dto);
            case ResolverInterface::OPERATION_GET_ONE:
                return $this->getOne->behave($dto);
            case ResolverInterface::OPERATION_GET_LIST:
                return $this->getList->behave($dto);
            case ResolverInterface::OPERATION_DELETE:
                return $this->delete->behave($dto);
        }

        throw new \Exception('Operation not found');
    }
}