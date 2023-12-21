<?php

namespace Database\Seeders;

use App\Models\GeneralCode;
use Illuminate\Database\Seeder;

class GeneralCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = \App\Models\User::first()->id;
        $generalCodes = [
            [
                'parent_id' => NULL,
                'level' => 0,
                'code' => 'types',
                'description_ar' => 'أنواع',
                'description_en' => 'Types',
                'is_active' => true,
                'created_by' => $userId
            ]
        ];
        foreach ($generalCodes as $generalCode)
            GeneralCode::firstOrCreate(
                ['code' => $generalCode['code']],
                [
                    'parent_id' => $generalCode['parent_id'],
                    'level' => $generalCode['level'],
                    'description_ar' => $generalCode['description_ar'],
                    'description_en' => $generalCode['description_en'],
                    'is_active' => $generalCode['is_active'],
                    'created_by' => $generalCode['created_by'],
                ]
            );
    }
}
