<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Model
{
    use HasFactory, SoftDeletes, BaseTrait;

    /**
     * @return bool
     */
    public function toggleActivation(): bool
    {
        return $this->update(['is_active' => !$this->is_active]);
    }
}
