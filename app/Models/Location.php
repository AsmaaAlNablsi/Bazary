<?php

namespace App\Models;

use App\Traits\TranslatedAttributes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Location extends BaseModel
{
    use  Searchable;

    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'level',
        'code',
        'name',
        'auto_location_id',
    ];

    /**
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(Location::class, 'parent_id');
    }

    /**
     * @return BelongsTo
     */
    public function autoLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'auto_location_id');
    }


    /**
     * @return mixed
     */
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
            'name' => '',
            'code' => '',
        ];
    }
}
