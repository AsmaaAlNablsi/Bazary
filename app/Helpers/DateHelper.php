<?php

namespace App\Helpers;

use App\Enums\UnitsEnum;
use Carbon\Carbon;

class DateHelper
{
    public static function checkDiff($from, $to = null, $diffToCompare = NULL, $unit = UnitsEnum::MIN)
    {
        $from = Carbon::createFromFormat('Y-m-d H:i:s', $from);
        /** @var Carbon $to */
        $to = $to ?? Carbon::now();
        $diffToCompare = $diffToCompare ?? config('activation.ttl');
        switch ($unit) {
            case UnitsEnum::SEC:
                $diff = $to->diffInSeconds($from);
                break;

            case UnitsEnum::MIN:
                $diff = $to->diffInMinutes($from);
                break;

            case UnitsEnum::HR:
                $diff = $to->diffInHours($from);
                break;

            case UnitsEnum::DAY:
                $diff = $to->diffInDays($from);
                break;

            case UnitsEnum::WKS:
                $diff = $to->diffInWeeks($from);
                break;

            case UnitsEnum::MTH:
                $diff = $to->diffInMonths($from);
                break;

            case UnitsEnum::YRS:
                $diff = $to->diffInYears($from);
                break;

            default:
                $diff = $to->diffInMilliseconds($from);
                break;
        }
        return $diff >= $diffToCompare;
    }
}
