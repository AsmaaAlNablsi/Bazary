<?php

namespace App\Observers;

use App\Models\GeneralCode;
use DB;

class GeneralCodeObserver
{
    public function creating(GeneralCode $generalCode): void
    {
        if ($generalCode->parent)
            $generalCode->level = $generalCode->parent->level + 1;
        else
            $generalCode->level = 0;
    }
}
