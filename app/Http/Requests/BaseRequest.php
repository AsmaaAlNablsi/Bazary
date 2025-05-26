<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class BaseRequest extends FormRequest
{
    public function __construct()
   {
    
    Validator::extend('exists_ignore_deleted', function ($attribute, $value, $parameters, $validator) {
        $table = $parameters[0];
        $column = $parameters[1] ?? $attribute; // Default to the attribute name
        $exceptId = $parameters[3] ?? null;

        $query = \DB::table($table)->whereNull('deleted_at');

        if (is_array($value)) {
            $query->whereIn($column, $value);
        } else {
            $query->where($column, $value);
        }

        if ($withTrashed) {
            $query->withTrashed();
        }
        if ($exceptId) {
            $query->where('id', '!=', $exceptId);
        }

        return $query->exists();
    });
    
    
    Validator::extend('unique_ignore_deleted', function ($attribute, $value, $parameters, $validator) {
        $table = $parameters[0];
        $column = $parameters[1] ?? $attribute;
        $exceptId = $parameters[2] ?? null;
    
        $query = \DB::table($table)->where($column, $value)->whereNull('deleted_at');
    
        if ($exceptId) {
            $query->where('id', '!=', $exceptId);
        }
    
        return $query->doesntExist();
    });

   }
}
