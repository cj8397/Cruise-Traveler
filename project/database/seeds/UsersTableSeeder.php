<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'email' => 'vacationer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $faker = Faker::create();
        foreach(range(1,11) as $i) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'first' => $faker->firstName,
                'last' => $faker->lastName,
                'dob' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
                'sex' => $faker->boolean($chanceOfGettingTrue = 50),
                'lang' => $faker->languageCode,
                'country' => $faker->country,
                'password' => bcrypt('password'),
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now'),

            ]);
        }
    }
}
