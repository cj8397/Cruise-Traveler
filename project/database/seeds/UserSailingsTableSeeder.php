<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Sailing;

class UserSailingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cant drop all data in the table becuase it is refenced in the events table now...
        // DB::table('user_sailings')->delete();

        $firstUser = User::all()->first()->id;
        $firstSailing = Sailing::all()->first()->id;
        $lastSailing = Sailing::all()->last()->id;

        for($i = $firstSailing; $i < $lastSailing; $i++) {
            for ($j = $firstUser; $j < ($firstUser + 10); $j++) {
                DB::table('user_sailings')->insert([
                    'user_id' => $j,
                    'sailing_id' => $i
                ]);
            }
        }
    }
}
