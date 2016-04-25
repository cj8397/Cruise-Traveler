<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Sailing;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->delete();

        $first = Sailing::all()->first()->id;
        $last = Sailing::all()->last()->id;

        $faker = Faker::create();
        // 12 sailings right now
        foreach(range($first,$last) as $i) {
            for($j = 1; $j <= 3; $j++) {
                DB::table('events')->insert([
                    'sailing_id' => $i,
                    'title' => 'event ' . $j,
                    'start_date' => $faker->dateTimeBetween($startDate = '+30 days', $endDate='+60 days'),
                    'end_date' => $faker->dateTimeBetween($startDate = '+60 days', $endDate='+90 days'),
                    'desc' => $faker->email,
                    'location' => $faker->email,
                ]);
            }
        }
    }
}