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
            'slug' => 'brand-m1',
            'created_at' => now(),
            'updated_at' => now()
        ],
            [
                'name' => 'M2',
                'slug' => 'brand-m2',
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'name' => 'M3',
                'slug' => 'brand-m3',
                'created_at' => now(),
                'updated_at' => now()
            ]];
        DB::table('brand_design')->insert($brand_designs);

    }

}
