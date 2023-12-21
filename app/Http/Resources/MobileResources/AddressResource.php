<?php

namespace App\Http\Resources\MobileResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
            'parent_id' => $this->parent_id,
            'code' => $this->code,
            'level' => $this->level,
        ];
    }

}
