<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User Seed Data
        DB::table('users')->insert(array(
            array(
            'name' => "Bert Kint",
            'email' => 'bert@kadonation.com',
            'password' => bcrypt('secret'),
            ),
            array(
            'name' => "Tam Asse",
            'email' => 'tam@kadonation.com',
            'password' => bcrypt('secret'),
            )
            ));
    }
}
