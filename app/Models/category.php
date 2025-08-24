<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class category extends BaseModel
{
    use  Searchable;

    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    /**
     * Define search keys
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'name_ar' => '',
            'name_en' => '',
        ];
    }
}
