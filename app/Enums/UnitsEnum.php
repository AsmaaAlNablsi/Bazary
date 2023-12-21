<?php

namespace App\Enums;

enum UnitsEnum: string
{
    case MIN = 'minutes';
    case SEC = 'seconds';
    case HR = 'hours';
    case DAY = 'days';
    case WKS = 'weeks';
    case MTH = 'months';
    case YRS = 'years';

    public static function asArray(): array
    {
        return array_map(fn($x) => $x->value, self::cases());
    }
}
