<?php

namespace Database\Seeders;

use App\Models\User;
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
        // Users
        User::Create(
            [
                'name' => 'begzod',
                'email' => 'erkinovbegzod.45@gmail.com',
                'password' => bcrypt('begzod12345'),
            ]
        );

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
                    'rtl' => 1,
                    'created_at' => '2019-04-28 23:34:12',
                    'updated_at' => '2019-04-28 23:34:12',
                ),
        ));

        DB::table('translations')->delete();

        DB::table('translations')->insert(array (
            0 =>
                array (
                    'id' => 3,
                    'lang' => 'en',
                    'lang_key' => 'All Category',
                    'lang_value' => 'All Category',
                    'created_at' => '2020-11-02 12:40:38',
                    'updated_at' => '2020-11-02 12:40:38',
                ),
            1 =>
                array (
                    'id' => 4,
                    'lang' => 'en',
                    'lang_key' => 'All',
                    'lang_value' => 'All',
                    'created_at' => '2020-11-02 12:40:38',
                    'updated_at' => '2020-11-02 12:40:38',
                ),
        ));
    }
}
