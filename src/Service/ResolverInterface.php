<?php

namespace App\Service;

use App\Dto\InternalRequest;

interface ResolverInterface
{
    public const OPERATION_CREATE = 'create';
    public const OPERATION_UPDATE = 'update';
    public const OPERATION_GET_ONE = 'get_one';
    public const OPERATION_GET_LIST = 'get_list';
    public const OPERATION_DELETE = 'delete';

    public function resolve(InternalRequest $dto): ServiceInterface;
}