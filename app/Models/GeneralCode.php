<?php

namespace App\Models;

use App\Traits\TranslatedDescription;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GeneralCode extends BaseModel
{
    use TranslatedDescription;

    protected $table = 'general_codes';

    protected $fillable = [
        'parent_id',
        'level',
        'code',
        'description_ar',
        'description_en',
        'is_active',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(GeneralCode::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(GeneralCode::class, 'parent_id');
    }

}
