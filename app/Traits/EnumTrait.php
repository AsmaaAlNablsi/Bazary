<?php

namespace App\Traits;


trait EnumTrait
{

    public static function getData(): array
    {
      if(defined('self::ENUM_DATA')){
        return array_values(self::ENUM_DATA);
      }

      return array_column(self::cases(), 'value');
    }

    public static function getValues(): array
    {
      if(defined('self::ENUM_DATA')){
        return array_column(self::cases(), 'value');
      }

      return array_column(array_column(self::cases(), 'value'), 'value');
    }

    public static function getCase($case)
    {
        if(is_array(self::getValues())){
            $cases_collection = collect(self::getData());
            $cases_values = $cases_collection->keyBy('value')->toArray();
            return $cases_values[$case] ?? null;
        }
        return self::tryFrom($case);
    }

    public static function getCaseFromEnumData($value)
    {
      if(is_array(self::getValues())){
        $cases_collection = collect(self::getData())->filter(function($case) use ($value) {
          if(isset($case['title_ar']) && isset($case['title_en']))
          return str_contains($case['title_en'], $value) || str_contains($case['title_ar'], $value);
        });
        return $cases_collection->pluck('value');
      }
    }
    
}