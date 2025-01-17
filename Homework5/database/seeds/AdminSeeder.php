<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Nechifor Gabriel',
                'email' => 'gabriel.nechifor983@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
