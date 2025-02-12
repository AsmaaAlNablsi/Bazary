<?php

namespace App\Models;

use App\Traits\TranslatedAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Address extends BaseModel
{
    use TranslatedAttributes, Searchable;

    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'level',
        'code',
        'name_ar',
        'name_en',
        'description',
        'is_active',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Address::class, 'parent_id');
    }

    public function grandParent()
    {
        return $this->parent?->parent;
    }

    /**
     * @return bool
     */
    public function hasRelations(): bool
    {
        if (sizeof($this->children) > 0)
            return true;
        return false;
    }

    /**
     * Define search keys
     * 
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'name_en' => '',
            'name_ar' => ''
        ];
    }
}
