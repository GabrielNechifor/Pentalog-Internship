<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'name' => 'Unreturned book',
                'message' => "Borrowing period for 'Death Note, Volume 1' has passed. Please return the book.",
                'seen' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
                'user_id' => 3,
                'admin_id' => null,
            ],
            [
                'name' => 'Unreturned book',
                'message' => "Andrioaia Claudiu (ID: 3) has passed the borrowing period for 'Death Nove, Volume 1'.",
                'seen' => false,
                'created_at' => NOW(),
                'updated_at' => NOW(),
                'user_id' => null,
                'admin_id' => 1,
            ],
        ]);
    }
}
