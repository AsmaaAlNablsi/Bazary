<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = \App\Models\User::first()->id;
        $addresses = [
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'دمشق',
                'name_en' => 'Damascus',
                'code' => 'C1',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'السويداء',
                'name_en' => 'As-Suwayda',
                'code' => 'C2',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'ريف دمشق',
                'name_en' => 'Rif-Dimashq',
                'code' => 'C3',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'القنيطرة',
                'name_en' => 'Kenitra',
                'code' => 'C4',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'حلب',
                'name_en' => 'Aleppo',
                'code' => 'C5',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'اللاذقية',
                'name_en' => 'Latakia',
                'code' => 'C6',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'درعا',
                'name_en' => 'Daraa',
                'code' => 'C7',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'طرطوس',
                'name_en' => 'Tartous',
                'code' => 'C8',
                'is_active' => true,
                'created_by' => $userId
            ], [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'حمص',
                'name_en' => 'Homs',
                'code' => 'C9',
                'is_active' => true,
                'created_by' => $userId
            ], [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'حماه',
                'name_en' => 'Hama',
                'code' => 'C10',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'دير الزور',
                'name_en' => 'Deer Al Zour',
                'code' => 'C11',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'ادلب',
                'name_en' => 'Idlib',
                'code' => 'C12',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'الرقة',
                'name_en' => 'Raqqa',
                'code' => 'C13',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => NULL,
                'level' => 0,
                'name_ar' => 'الحسكة',
                'name_en' => 'Al-Hasakah',
                'code' => 'C14',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 1,
                'level' => 1,
                'name_ar' => 'المزة',
                'name_en' => 'Al-Mazzah',
                'code' => 'M1',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 1,
                'level' => 1,
                'name_ar' => 'ميدان',
                'name_en' => 'Al-Midan',
                'code' => 'M2',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 15,
                'level' => 2,
                'name_ar' => 'مزة جبل',
                'name_en' => 'Al-Mazzah-Jabal',
                'code' => 'M3',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 2,
                'level' => 1,
                'name_ar' => 'صلخد',
                'name_en' => 'Al-Mazzah-Villat',
                'code' => 'Sl4',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 18,
                'level' => 2,
                'name_ar' => 'عرمان',
                'name_en' => 'Al-Arman',
                'code' => 'AR5',
                'is_active' => true,
                'created_by' => $userId
            ],

            [
                'parent_id' => 3,
                'level' => 1,
                'name_ar' => 'النبك',
                'name_en' => 'Al-nabik',
                'code' => 'An6',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 19,
                'level' => 2,
                'name_ar' => 'يبرود',
                'name_en' => 'Yabroud',
                'code' => 'Y7',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 4,
                'level' => 1,
                'name_ar' => 'فيق',
                'name_en' => 'Fayaq',
                'code' => 'F8',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 5,
                'level' => 1,
                'name_ar' => 'اعزاز',
                'name_en' => 'Eazaz',
                'code' => 'E9',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 6,
                'level' => 1,
                'name_ar' => 'كسب',
                'name_en' => 'Kasab',
                'code' => 'K10',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 7,
                'level' => 1,
                'name_ar' => 'الصنمين',
                'name_en' => 'Al-sanmean',
                'code' => 'Sn11',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 8,
                'level' => 1,
                'name_ar' => 'صافيتا',
                'name_en' => 'Safeta',
                'code' => 'Sa12',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 9,
                'level' => 1,
                'name_ar' => 'حسياء',
                'name_en' => 'Hesea',
                'code' => 'He13',
                'is_active' => true,
                'created_by' => $userId
            ],

            [
                'parent_id' => 10,
                'level' => 1,
                'name_ar' => 'سلمية',
                'name_en' => 'Salmaia',
                'code' => 'Sa14',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 11,
                'level' => 1,
                'name_ar' => 'البوكمال',
                'name_en' => 'Al-Bokamal',
                'code' => 'Bok15',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 12,
                'level' => 1,
                'name_ar' => 'معرة النعمان',
                'name_en' => 'Maaret-Alnoaman',
                'code' => 'MN16',
                'is_active' => true,
                'created_by' => $userId
            ],
            [
                'parent_id' => 13,
                'level' => 1,
                'name_ar' => 'الطبقة',
                'name_en' => 'Al-Tabaka',
                'code' => 'Tab17',
                'is_active' => true,
                'created_by' => $userId
            ],
        ];
        foreach ($addresses as $address)
            $address = Address::firstOrCreate(
                [
                    'parent_id' => $address['parent_id'],
                    'level' => $address['level'],
                    'name_ar' => $address['name_ar'],
                    'name_en' => $address['name_en'],
                    'code' => $address['code'],
                    'is_active' => $address['is_active'],
                    'created_by' => $address['created_by'],
                ]
            );
    }
}
