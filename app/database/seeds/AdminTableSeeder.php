<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class AdminTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();
        DB::table('admin')->truncate();

        foreach(range(1, 10) as $index)
        {
            Admin::create(array(
                'username'  => $faker->userName,
                'email'     => $faker->email,
                'name'      => $faker->name,
                'type'      => 1,
                'status'    => 1,
                'password'  => Hash::make('muthu123')
            ));
        }
	}

}