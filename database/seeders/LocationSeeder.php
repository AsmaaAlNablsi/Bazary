<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::first()->id;

        $countries = [
            [ 'name' => 'China', 'code' => 'CN'],
            [ 'name' => 'United States', 'code' => 'US'],
            [ 'name' => 'Germany', 'code' => 'DE'],
            [ 'name' => 'Japan', 'code' => 'JP'],
            [ 'name' => 'India', 'code' => 'IN'],
            [ 'name' => 'Australia', 'code' => 'AU'],
            [ 'name' => 'Netherlands', 'code' => 'NL'],
            [ 'name' => 'Syria', 'code' => 'SY'],
            [ 'name' => 'United Arab Emirates', 'code' => 'AE'],
            [ 'name' => 'Egypt', 'code' => 'EG'],
            [ 'name' => 'France', 'code' => 'FR'],
            [ 'name' => 'United Kingdom', 'code' => 'GB'],
            [ 'name' => 'Canada', 'code' => 'CA'],
            [ 'name' => 'Spain', 'code' => 'ES'],
            [ 'name' => 'Italy', 'code' => 'IT'],
            [ 'name' => 'Saudi Arabia', 'code' => 'SA'],
            [ 'name' => 'Turkey', 'code' => 'TR'],
        ];

        $countryIds = [];
        foreach ($countries as $country) {
            $countryRecord = Location::firstOrCreate([
                'parent_id'  => NULL,
                'level'      => 0,
                'name'       => $country['name'],
                'code'       => $country['code'],
                'created_by' => $userId,
            ]);
            $countryIds[$country['code']] = $countryRecord->id;
        }

        $chinaGovernorates = [
            ['name' => 'Beijing', 'code' => 'CN-01'],
            ['name' => 'Shanghai', 'code' => 'CN-02'],
        ];

        $usGovernorates = [
            ['name' => 'New York', 'code' => 'US-01'],
            ['name' => 'Los Angeles', 'code' => 'US-02'],
        ];

        $germanyGovernorates = [
            ['name' => 'Berlin', 'code' => 'DE-01'],
            ['name' => 'Munich', 'code' => 'DE-02'],
        ];

        $japanGovernorates = [
            ['name' => 'Tokyo', 'code' => 'JP-01'],
            ['name' => 'Osaka', 'code' => 'JP-02'],
        ];

        $indiaGovernorates = [
            ['name' => 'Delhi', 'code' => 'IN-01'],
            ['name' => 'Mumbai', 'code' => 'IN-02'],
        ];

        $australiaGovernorates = [
            ['name' => 'Sydney', 'code' => 'AU-01'],
            ['name' => 'Melbourne', 'code' => 'AU-02'],
        ];

        $netherlandsGovernorates = [
            ['name' => 'Amsterdam', 'code' => 'NL-01'],
            ['name' => 'Rotterdam', 'code' => 'NL-02'],
        ];

        $syriaGovernorates = [
            ['name' => 'Damascus', 'code' => 'SY-01'],
            ['name' => 'Aleppo', 'code' => 'SY-02'],
        ];

        $uaeGovernorates = [
            ['name' => 'Abu Dhabi', 'code' => 'AE-01'],
            ['name' => 'Dubai', 'code' => 'AE-02'],
        ];

        $egyptGovernorates = [
            ['name' => 'Cairo', 'code' => 'EG-01'],
            ['name' => 'Alexandria', 'code' => 'EG-02'],
        ];

        $franceGovernorates = [
            ['name' => 'Paris', 'code' => 'FR-01'],
            ['name' => 'Lyon', 'code' => 'FR-02'],
        ];

        $ukGovernorates = [
            ['name' => 'London', 'code' => 'GB-01'],
            ['name' => 'Manchester', 'code' => 'GB-02'],
        ];

        $canadaGovernorates = [
            ['name' => 'Toronto', 'code' => 'CA-01'],
            ['name' => 'Vancouver', 'code' => 'CA-02'],
        ];

        $spainGovernorates = [
            ['name' => 'Madrid', 'code' => 'ES-01'],
            ['name' => 'Barcelona', 'code' => 'ES-02'],
        ];

        $italyGovernorates = [
            ['name' => 'Rome', 'code' => 'IT-01'],
            ['name' => 'Milan', 'code' => 'IT-02'],
        ];

        $saudiGovernorates = [
            ['name' => 'Riyadh', 'code' => 'SA-01'],
            ['name' => 'Jeddah', 'code' => 'SA-02'],
        ];

        $turkeyGovernorates = [
            ['name' => 'Istanbul', 'code' => 'TR-01'],
            ['name' => 'Ankara', 'code' => 'TR-02'],
        ];

        $governorateLists = [
            'CN' => $chinaGovernorates,
            'US' => $usGovernorates,
            'DE' => $germanyGovernorates,
            'JP' => $japanGovernorates,
            'IN' => $indiaGovernorates,
            'AU' => $australiaGovernorates,
            'NL' => $netherlandsGovernorates,
            'SY' => $syriaGovernorates,
            'AE' => $uaeGovernorates,
            'EG' => $egyptGovernorates,
            'FR' => $franceGovernorates,
            'GB' => $ukGovernorates,
            'CA' => $canadaGovernorates,
            'ES' => $spainGovernorates,
            'IT' => $italyGovernorates,
            'SA' => $saudiGovernorates,
            'TR' => $turkeyGovernorates,
        ];

        $governorateIds = [];

        foreach ($governorateLists as $countryCode => $governorates) {
            foreach ($governorates as $gov) {
                $record = Location::firstOrCreate([
                    'parent_id'  => $countryIds[$countryCode],
                    'level'      => 1,
                    'name'       => $gov['name'],
                    'code'       => $gov['code'],
                    'created_by' => $userId,
                ]);
                $governorateIds[$gov['code']] = $record->id;
            }
        }
    }
}
