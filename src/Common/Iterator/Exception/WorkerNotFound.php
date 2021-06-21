<?php

declare(strict_types=1);

namespace App\Common\Iterator\Exception;

use Throwable;

final class WorkerNotFound extends \Exception implements Throwable
{
    private const MESSAGE = 'Iterator worker not found for class';
    private const CODE = 500;

    public function __construct(string $message, $code = self::CODE, Throwable $previous = null)
    {
        $message = self::MESSAGE . $message;
        parent::__construct($message, $code, $previous);
    }
}