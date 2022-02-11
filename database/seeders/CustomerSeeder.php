<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => 'Ali',
            'last_name' => 'Shikhiyev',
            'email' => 'ali@gmail.com',
            'fin'=>'4HPSQL6',
            'is_corp'=>'corporate',
            'password' => Hash::make('123'),
        ]);
    }
}
