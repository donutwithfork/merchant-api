<?php

declare(strict_types=1);

namespace App\Common\Merchant\Exception;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Throwable;

final class DuplicateSkuException extends BadRequestHttpException
{
    private const MESSAGE = 'Item with given sku exist';
    private const CODE = 400;

    public function __construct($message = self::MESSAGE, $code = self::CODE, Throwable $previous = null)
    {
        parent::__construct($message, $previous, $code);
    }
}