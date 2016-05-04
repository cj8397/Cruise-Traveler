<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UserDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_details')->delete();

        $first = User::all()->first()->id;
        $last = User::all()->last()->id;

        $faker = Faker::create();
        // 12 sailings right now
        foreach (range($first, $last) as $i) {
            DB::table('user_details')->insert([
                'user_id' => $i,
                'first' => $faker->firstName(),
                'last' => $faker->lastName(),
                'dob' => $faker->dateTimeBetween($startDate = '-90 years', $endDate = 'now'),
                'sex' => $faker->numberBetween($min = 0, $max = 1),
                'lang' => $faker->languageCode(),
                'country' => $faker->country(),
                'region' => $faker->state(),
                'city' => $faker->city(),
                'address' => $faker->streetAddress(),
                'family' => $faker->numberBetween($min = 0, $max = 1),
                'co_travellers' => $faker->numberBetween($min = 0, $max = 10),
            ]);
        }
    }
}
