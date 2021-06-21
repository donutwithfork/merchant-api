<?php

declare(strict_types=1);

namespace App\Common\Decoders;

final class JsonDecoder implements DecoderInterface
{
    public function decode($data)
    {
        return json_decode($data, true);
    }
}