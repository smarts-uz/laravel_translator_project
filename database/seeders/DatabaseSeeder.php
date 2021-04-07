<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();

        DB::table('languages')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'English',
                    'code' => 'en',
                    'rtl' => 0,
                    'created_at' => '2019-01-20 17:13:20',
                    'updated_at' => '2019-01-20 17:13:20',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => "O'zbekcha",
                    'code' => 'uz',
                    'rtl' => 0,
                    'created_at' => '2019-02-17 11:35:37',
                    'updated_at' => '2019-02-18 11:49:51',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Русский',
                    'code' => 'ru',
                    'rtl' => 0,
                    'created_at' => '2019-04-28 23:34:12',
                    'updated_at' => '2019-04-28 23:34:12',
                ),
        ));
    }
}
