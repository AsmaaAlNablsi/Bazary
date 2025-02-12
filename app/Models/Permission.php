<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    use Searchable;

    protected $fillable = [
        'name',
        'name_ar',
        'guard_name'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_has_permissions');
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
            'name_ar' => ''
        ];
    }
}
