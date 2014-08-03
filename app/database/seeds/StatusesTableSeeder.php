<?php

use Larabook\Statuses\Status;
use Larabook\Users\User;
use Faker\Factory as Faker;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
		$userIds = User::lists('id');

		foreach(range(1, 100) as $index)
		{
			Status::create([
				'user_id' => $faker->randomElement($userIds),
				'body' => $faker->sentence()
			]);
		}
	}

}