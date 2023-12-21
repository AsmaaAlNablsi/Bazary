<?php

namespace App\Observers;

use App\Models\Address;
use DB;

class AddressObserver
{
    public function creating(Address $address): void
    {
        if ($address->parent)
            $address->level = $address->parent->level + 1;
        else
            $address->level = 0;
    }
}
