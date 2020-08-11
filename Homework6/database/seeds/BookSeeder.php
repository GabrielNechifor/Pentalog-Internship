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
                'type' => 'Light novel',
                'volume' => 1,
                'copies_number' => 3,
                'publish_year' => 2014,
                'author_id' => 1,
                'publisher_id' => 1,
                'cover_link' => 'books/ReZero.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Death Note',
                'type' => 'Manga',
                'volume' => 1,
                'copies_number' => 2,
                'publish_year' => 2003,
                'author_id' => 4,
                'publisher_id' => 3,
                'cover_link' => 'books/DeathNote.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Mob Psycho 100',
                'type' => 'Manga',
                'volume' => 1,
                'copies_number' => 3,
                'publish_year' => 2012,
                'author_id' => 3,
                'publisher_id' => 3,
                'cover_link' => 'books/MobPsycho100.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'One punch man',
                'type' => 'Manga',
                'volume' => 1,
                'copies_number' => 1,
                'publish_year' => 2012,
                'author_id' => 3,
                'publisher_id' => 3,
                'cover_link' => 'books/OnePunchMan.jpg',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'title' => 'Rascal Does Not Dream of Bunny Girl Senpai',
                'type' => 'Light novel',
                'volume' => 1,
                'copies_number' => 2,
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
