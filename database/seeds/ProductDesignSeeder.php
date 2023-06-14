<?php

use Illuminate\Database\Seeder;

class ProductDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_designs = [
            [
                'name' => 'P1',
                'slug' => 'p1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'P2',
                'slug' => 'p2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'P3',
                'slug' => 'p3',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('product_designs')->insert($product_designs);
    }
}
