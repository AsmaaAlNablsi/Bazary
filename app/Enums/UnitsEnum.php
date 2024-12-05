<?php

namespace App\Enums;

enum UnitsEnum: string
{
    /**
     * Example of enum
     */
    use EnumTrait;

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

    const ENUM_DATA = [
        self::MIN->value => [
            'title_en' => 'Min',
            'title_ar' => 'دقائق',
            'value' => 'min',
        ]
    ];
}

