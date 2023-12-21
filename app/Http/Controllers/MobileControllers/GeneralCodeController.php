<?php

namespace App\Http\Controllers\MobileControllers;

use App\Enums\GeneralCodesEnum;
use App\Http\Resources\MobileResources\AddressResource;
use App\Http\Resources\MobileResources\GeneralCodeResource;
use App\Models\Address;
use App\Models\GeneralCode;

class GeneralCodeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return self::mobileResponse('success',
            [
                'types' => GeneralCodeResource::collection(GeneralCode::select('general_codes.*')
                    ->join('general_codes as parent', 'general_codes.parent_id', 'parent.id')
                    ->where('parent.code', GeneralCodesEnum::TYPES)
                    ->where('general_codes.is_active', true)->get()),
                'Addresses' => AddressResource::collection(Address::whereIsActive(true)->get())
            ]
        );
    }
}
