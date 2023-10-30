<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contact::factory(10)->create();
        $this->call([
            UserSeeder::class
        ]);
        $this->call([
            RolesAndPermissionsSeeder::class
        ]);
        $this->call([
            Translate::class
        ]);
        $this->call([
            MenuSeeder::class
        ]);
        $this->call([
            ConfiguresSeeder::class
        ]);
        $this->call([
            DistrictSeeder::class
        ]);
        $this->call([
            ProvinceSeeder::class
        ]);
    }
}
