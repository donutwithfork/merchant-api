<?php

declare(strict_types=1);

namespace App\Common\Generators\Exception;

use Throwable;

final class GeneratorNotFoundException extends \Exception implements Throwable
{
    private const MESSAGE = 'Generator not found';
    private const CODE = 500;

    public function __construct($message = self::MESSAGE, $code = self::CODE, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
