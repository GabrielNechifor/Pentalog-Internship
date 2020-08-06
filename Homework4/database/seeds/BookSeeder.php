<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            [
                'title' => 'Re:Zero − Starting Life in Another World',
                'publish_year' => 2014,
                'author_id' => 1,
                'publisher_id' => 1,
                'cover_link' => 'books/ReZero.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Death Note',
                'publish_year' => 2003,
                'author_id' => 4,
                'publisher_id' => 3,
                'cover_link' => 'books/DeathNote.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Mob Psycho 100',
                'publish_year' => 2012,
                'author_id' => 3,
                'publisher_id' => 3,
                'cover_link' => 'books/MobPsycho100.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'One punch man',
                'publish_year' => 2012,
                'author_id' => 3,
                'publisher_id' => 3,
                'cover_link' => 'books/OnePunchMan.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Rascal Does Not Dream of Bunny Girl Senpai',
                'publish_year' => 2014,
                'author_id' => 2,
                'publisher_id' => 2,
                'cover_link' => 'books/BunnyGirlSenpai.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
        ]);
    }
}
