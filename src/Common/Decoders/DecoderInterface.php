<?php

declare(strict_types=1);

namespace App\Common\Decoders;

interface DecoderInterface
{
    public function decode($data);
}