<?php

use Carbon\Carbon;

class UserBookTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('books_users')->truncate();

        for ($i = 1; $i < 51; $i++) {
            DB::table('books_users')->insert([
                [
                    'user_id' => $i,
                    'book_id' => $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'user_id' => $i,
                    'book_id' => 51 - $i,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]
            ]);
        }
    }
}
