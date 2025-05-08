<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'name_ar' => 'عرض قائمة الأدوار',
                'name' => 'roles'],
            [
                'name_ar' => 'إنشاء دور',
                'name' => 'roles/create',
            ],
            [
                'name_ar' => 'تعديل دور',
                'name' => 'roles/update',
            ],
            [
                'name_ar' => 'حذف دور',
                'name' => 'roles/delete',
            ],
            [
                'name_ar' => 'عرض تفاصيل دور',
                'name' => 'roles/details',
            ],
            [
                'name_ar' => 'عرض قائمة الصلاحيات',
                'name' => 'permissions',
            ],
            [
                'name_ar' => 'عرض قائمة العناوين',
                'name' => 'addresses',
            ],
            [
                'name_ar' => 'إنشاء عنوان',
                'name' => 'addresses/create',
            ],
            [
                'name_ar' => 'تعديل عنوان',
                'name' => 'addresses/update',
            ],
            [
                'name_ar' => 'عرض تفاصيل عنوان',
                'name' => 'addresses/details',
            ],
            [
                'name_ar' => 'حذف عنوان',
                'name' => 'addresses/delete',
            ],
            [
                'name_ar' => 'تفعيل / إلغاء تفعيل عنوان',
                'name' => 'addresses/toggle-activation',
            ],
            [
                'name_ar' => 'عرض قائمة المستخدمين',
                'name' => 'users',
            ],
            [
                'name_ar' => 'إنشاء مستخدم',
                'name' => 'users/create',
            ],
            [
                'name_ar' => 'تعديل مستخدم',
                'name' => 'users/update',
            ],
            [
                'name_ar' => 'عرض تفاصيل مستخدم',
                'name' => 'users/details',
            ],
            [
                'name_ar' => 'حذف مستخدم',
                'name' => 'users/delete',
            ],
            [
                'name_ar' => 'تفعيل / إلغاء تفعيل مستخدم',
                'name' => 'users/toggle-activation',
            ],
            
            [
                'name_ar' => 'لوحة التحكم',
                'name' => 'dashboard',
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::query()->firstOrCreate(
                ['name' => $permission['name']],
                [
                    'name_ar' => $permission['name_ar'],
                    'name' => $permission['name'],
                ]
            );
        }

        $admin = User::where('email', 'admin@tatweer.sy')->first();

        $superAdmin = Role::firstOrCreate(
            ['name' => 'SuperAdmin'],
            [
                'name' => 'SuperAdmin',
                'name_ar' => 'مدير النظام',
                'created_by' => $admin->id
            ]
        );

        $superAdmin->syncPermissions(Permission::all());

        $admin->assignRole([$superAdmin]);
    }
}
