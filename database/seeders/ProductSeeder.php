<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Products table seed data
        DB::table('products')->insert(array(
            array(
            'name' => "Fifa 2012",
            'category' => 'Games',
            'sku' => 'A0001',
            'price' => 69.99,
            'quantity' => 20
            ),
            array(
            'name' => "Assasin’s Creed 5",
            'category' => 'Games',
            'sku' => 'A0002',
            'price' => 79.99,
            'quantity' => 15
            ),
            array(
            'name' => "Steve",
            'category' => 'Computers',
            'sku' => 'A0003',
            'price' => 1399.99,
            'quantity' => 10
            ),
            array(
            'name' => "Steve",
            'category' => 'TVs and Accessories',
            'sku' => 'A0004',
            'price' => 2399.99,
            'quantity' => 5
            )
            ));
    }
}
