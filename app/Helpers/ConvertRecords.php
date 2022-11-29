<?php

declare(strict_types = 1);

namespace App\Helpers;

class ConvertRecords
{
    public function decode(mixed $array): array
    {
        return json_decode(json_encode($array), true);
    }
}