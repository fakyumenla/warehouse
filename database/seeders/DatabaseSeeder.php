<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Office;
use App\Models\Region;
use App\Models\Type;
use App\Models\Employee;
use App\Models\History_ownership;
use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Employee::create([
            // 'id' => '1',
            'name' => 'Guntur',
            'address' => 'Indramayu',
            'gender' => 'Male',
            'nik' => '3212131404'
        ]);

        Employee::create([
            // 'id' => '2',
            'name' => 'Harley',
            'address' => 'Land of Dawn',
            'gender' => 'Male',
            'nik' => '3212130409'
        ]);

        Type::create([
            'name' => 'Laptop'
        ]);

        Office::create([
            // 'id' => '1',
            'region_id' => '1',
            'name' => 'Kantor Sukamaju',
            'address' => 'Jl. H.M. Thohir, Beji, Depok'
        ]);

        Region::create([
            'name' => 'Depok'
        ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin123')
        ]);
    }
}
