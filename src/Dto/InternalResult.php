<?php

declare(strict_types=1);

namespace App\Dto;

final class InternalResult
{
    public static $loaded = true;
    private $result;
    private $error;

    public function getResult()
    {
        return $this->result;
    }

    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }

    public function getError()
    {
        return $this->error;
    }
}
