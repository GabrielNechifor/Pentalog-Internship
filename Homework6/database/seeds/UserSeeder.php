<?php

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
        DB::table('users')->insert([
            [
                'name' => 'Nechifor Gabriel',
                'gender' => 'male',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 3, 3, 1998)),
                'address' => 'abc',
                'phone_number' => '123',
                'email' => 'gabriel.nechifor983@gmail.com',
                'password' => Hash::make('1234'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Nechifor Maria',
                'gender' => 'female',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 1, 1, 2001)),
                'address' => 'abc',
                'phone_number' => '123',
                'email' => 'abc@abc.com',
                'password' => Hash::make('1234'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Andrioaia Claudiu',
                'gender' => 'male',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 2, 2, 1997)),
                'address' => 'abc',
                'phone_number' => '123',
                'email' => 'abc@abc.com',
                'password' => Hash::make('1234'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Ignat Iustin',
                'gender' => 'male',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 4, 4, 1999)),
                'address' => 'abc',
                'phone_number' => '123',
                'email' => 'abc@abc.com',
                'password' => Hash::make('1234'),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
