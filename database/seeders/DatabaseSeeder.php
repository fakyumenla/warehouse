<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Office;
use App\Models\Region;
use App\Models\Type;
use App\Models\Employee;
use App\Models\History_ownership;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

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
            'name' => 'Guntur',
            'address' => 'Indramayu',
            'gender' => 'Male',
            'nik' => '3212131404'
        ]);

        Item::create([
            'office_id' => '1',
            'type_id' => '1',
            'region_id' => '1',
            'name' => 'ASUS Zephyrus X2',
            'description' => 'VGA NVIDIA GTX3060, RAM 16GB, Storage 512GB SSD',
            'barcode_image' => 'Path/path1/path2'
        ]);

        Item::create([
            'office_id' => '1',
            'type_id' => '1',
            'region_id' => '1',
            'name' => 'Lenovo Legion STYX',
            'description' => 'VGA NVIDIA GTX3060, RAM 16GB, Storage 512GB SSD',
            'barcode_image' => 'Path/path1/path2'
        ]);

        Type::create([
            'name' => 'Laptop'
        ]);

        Office::create([
            'region_id' => '1',
            'name' => 'Kantor Sukamaju',
            'address' => 'Jl. H.M. Thohir, Beji, Depok'
        ]);

        Region::create([
            'name' => 'Depok'
        ]);

        History_ownership::create([
            'item_id' => '1',
            'employee_id' => '1',
            'start_date' => '2021-01-01'
        ]);

        History_ownership::create([
            'item_id' => '1',
            'employee_id' => '1',
            'start_date' => '2021-01-01'
        ]);
        
        History_ownership::create([
            'item_id' => '2',
            'employee_id' => '2',
            'start_date' => '2021-01-01'
        ]);
    }
}
