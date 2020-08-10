<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('borrowings')->insert([
            [
                'book_id' => 1,
                'user_id' => 1,
                'borrowing_date' => date('Y-m-d', mktime(null, null, null, 8, 3, 2020)),
                'returning_date' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'book_id' => 2,
                'user_id' => 3,
                'borrowing_date' => date('Y-m-d', mktime(null, null, null, 7, 3, 2020)),
                'returning_date' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'book_id' => 4,
                'user_id' => 2,
                'borrowing_date' => date('Y-m-d', mktime(null, null, null, 8, 3, 2020)),
                'returning_date' => null,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'book_id' => 3,
                'user_id' => 4,
                'borrowing_date' => date('Y-m-d', mktime(null, null, null, 7, 3, 2020)),
                'returning_date' => date('Y-m-d', mktime(null, null, null, 8, 3, 2020)),
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
