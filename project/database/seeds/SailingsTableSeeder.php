<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SailingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sailings')->delete();

        $cruiselines = ['Seabreeze', 'Starboard', 'Bluestar'];

        $faker = Faker::create();
        foreach (range(1, 50) as $i) {
            DB::table('sailings')->insert([
                'cruise_line' => $cruiselines[($i % 3)],
                'title' => 'Toms Cruise',
                'start_date' => $faker->dateTimeBetween($startDate = '+30 days', $endDate='+60 days'),
                'end_date' => $faker->dateTimeBetween($startDate = '+60 days', $endDate='+90 days'),
                'port_org' => 'Vancouver',
                'port_dest' => $faker->city(),
                'destination' => 'Vacation',
            ]);
        }
    }
}
