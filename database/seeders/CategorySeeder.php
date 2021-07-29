<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seeding the category table
        DB::table('categories')->insert(array(
            array(
              'name' => 'Games',
              
            ),
            array(
              'name' => 'Computers',
            ),
            array(
                'name' => 'TVs and Accessories',
            ),
          ));
    }
}
