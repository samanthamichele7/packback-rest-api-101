<?php

use Carbon\Carbon;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->truncate();

        for ($i = 0; $i < 50; $i++) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'name' => $faker->name,
                'password' => Hash::make($faker->word),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
