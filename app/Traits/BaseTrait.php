<?php

namespace App\Traits;


use Illuminate\Support\Facades\Auth;

trait BaseTrait
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = $model->created_by ?? Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });

        static::deleting(function ($model) {
            $model->deleted_by = Auth::id();
            $model->save();
        });
    }
}
