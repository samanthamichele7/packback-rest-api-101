<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        // Disable foreign key checks in order to truncate the tables
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $this->call('UserTableSeeder');
        $this->call('BookTableSeeder');
        $this->call('UserBookTableSeeder');

        // Enable foreign key constraints
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
