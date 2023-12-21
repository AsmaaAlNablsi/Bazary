<?php

namespace App\Observers;

use App\Models\ActivationCode;
use DB;

class ActivationCodeObserver
{
    public function creating(ActivationCode $activationCode): void
    {
        try {
            ActivationCode::where('mobile', $activationCode->mobile)->update(['is_active' => false, 'activated' => false]);
        } catch (Throwable $exception) {
            DB::rollBack();
        }
    }
}
