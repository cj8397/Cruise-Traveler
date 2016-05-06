<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
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
        $language = ['English', 'French', 'Cantonese', 'Mandarin', 'Spanish', 'Hungarion', 'Portugese', 'Jamacian', 'Russian', 'Croatian'];

        // 12 sailings right now
        foreach (range($first, $last) as $i) {
            $dob =$faker->dateTimeBetween($startDate = '-90 years', $endDate = 'now');
            DB::table('user_details')->insert([
                'user_id' => $i,
                'first' => $faker->firstName(),
                'last' => $faker->lastName(),
                'dob' => $dob,
                'age'=> Carbon::instance($dob)->age,
                'sex' => $faker->numberBetween($min = 0, $max = 1),
                'lang' => $language[$i % 10],
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
