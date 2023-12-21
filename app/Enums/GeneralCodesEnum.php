<?php

namespace App\Enums;

enum GeneralCodesEnum: string
{
    case TYPES = "types";

    public static function asArray(): array
    {
        return array_map(fn($x) => $x->value, self::cases());
    }
}
