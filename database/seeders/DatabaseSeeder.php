<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'System',
            'last_name' => 'Admin',
            'email' => 'admin@bazary.sy',
            'password' => Hash::make('Bazary@123'),
        ]);
        $this->call([
            LocationSeeder::class,
            PermissionsSeeder::class
        ]);
    }
}
