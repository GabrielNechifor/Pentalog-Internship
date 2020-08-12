<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PublisherSeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,
            UserSeeder::class,
            BorrowingSeeder::class,
            AdminSeeder::class,
            NotificationSeeder::class
        ]);
    }
}
