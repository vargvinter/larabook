<?php

use Larabook\Users\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			User::create([
				'username' => $faker->unique()->word(),
				'email' => $faker->unique()->email(),
				'password' => 'secret'
			]);
		}
	}

}