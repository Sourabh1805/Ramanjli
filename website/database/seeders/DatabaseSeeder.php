<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory(200)->create();

        $this->call(PermissionTableSeeder::class);
        $this->call(CreateDoctorUserSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
    }
}
