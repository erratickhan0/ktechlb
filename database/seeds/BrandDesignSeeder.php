<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BrandDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand_designs = [[
            'name' => 'M1',
            'slug' => 'm1',
            'created_at' => now(),
            'updated_at' => now()
        ],
            [
                'name' => 'M2',
                'slug' => 'm2',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'M3',
                'slug' => 'm3',
                'created_at' => now(),
                'updated_at' => now()
            ]];
        DB::table('brand_designs')->insert($brand_designs);

    }

}
