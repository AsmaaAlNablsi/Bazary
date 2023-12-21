<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends BaseModel
{
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function permissions(): BelongsTo
    {
        return $this->belongsTo(Permission::class);
    }
}
