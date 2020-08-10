<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('publishers')->insert([
            [
                'name' => 'Media Factory',
                'founded' => date('Y-m-d', mktime(null, null, null, 1, 12, 1987)),
                'origin_country' => 'Japan',
                'location' => 'Shibuya East NBF 3-3-5, Tokyo',
                'website' => 'http://www.mediafactory.jp',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Yen Press',
                'founded' => date('Y-m-d', mktime(null, null, null, 1, 1, 2006)),
                'origin_country' => 'United States',
                'location' => 'New York City, New York',
                'website' => 'http://www.yenpress.com',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Weekly Shounen Jump',
                'founded' => date('Y-m-d', mktime(null, null, null, 1, 8, 1968)),
                'origin_country' => 'Japan',
                'location' => 'Tokyo',
                'website' => 'http://www.shonenjump.com',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ],
            [
                'name' => 'Kodansha',
                'founded' => date('Y-m-d', mktime(null, null, null, 1, 12, 1938)),
                'origin_country' => 'Japan',
                'location' => 'Bunkyo, Tokyo',
                'website' => 'http://www.kodansha.co.jp',
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
        ]);
    }
}
