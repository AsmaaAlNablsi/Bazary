<?php

namespace App\Http\Resources\MobileResources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralCodeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'description_en' => $this->description_en,
            'description_ar' => $this->description_ar,
            'parent_id' => $this->parent_id,
            'code' => $this->code,
            'level' => $this->level,
        ];
    }

}
