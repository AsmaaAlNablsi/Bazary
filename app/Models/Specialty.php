<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialty extends BaseModel
{
    /** @use HasFactory<\Database\Factories\SpecialtyFactory> */
    use HasFactory;

    protected $guarded = [];

    public function hasRelations(): bool
    {
        return false;
    }

}
