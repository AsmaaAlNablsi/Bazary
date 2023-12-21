<?php

namespace App\Traits;

trait TranslatedDescription
{
    public function getDescriptionAttribute()
    {
        return $this->attributes['description_' . app()->getLocale()];
    }

}
