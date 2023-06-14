<?php

use Illuminate\Database\Seeder;

class ProductDetailDesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product_detail_designs = [
            [
                'name' => 'D1',
                'slug' => 'd1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'D2',
                'slug' => 'd2',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('product_detail_designs')->insert($product_detail_designs);

    }
}
