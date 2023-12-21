<?php

namespace App\Traits;

trait TranslatedAttributes
{
    public function getNameAttribute()
    {
        return $this->attributes['name_' . app()->getLocale()];
    }

}
