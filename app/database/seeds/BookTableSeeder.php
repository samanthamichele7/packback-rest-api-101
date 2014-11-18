<?php
use Carbon\Carbon;
use Faker\Factory as Faker;

class BookTableSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        DB::table('books')->truncate();

        for ($i = 0; $i < 50; $i++) {
            DB::table('books')->insert([
                'isbn13' => $faker->ean13(),
                'title' => $faker->sentence,
                'author' => $faker->name,
                'price' => $faker->randomNumber(2) . '.' . $faker->randomNumber(2),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
