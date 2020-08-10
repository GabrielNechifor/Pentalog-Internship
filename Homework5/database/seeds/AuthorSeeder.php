<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'name' => 'Nagatsuki Tappei',
                'gender' => 'Male',
                'country' => 'Japan',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 3, 11, 1987)),
                'image_url' => 'authors/NagatsukiTappei.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Hajime Kamoshida',
                'gender' => 'Male',
                'country' => 'Japan',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 11, 4, 1978)),
                'image_url' => 'authors/HajimeKamoshida.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'ONE',
                'gender' => 'Male',
                'country' => 'Japan',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 29, 10, 1989)),
                'image_url' => 'authors/One.png',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Takeshi Obata',
                'gender' => 'Male',
                'country' => 'Japan',
                'birth_date' => date('Y-m-d', mktime(null, null, null, 11, 2, 1969)),
                'image_url' => 'authors/HitohikoAraki.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
