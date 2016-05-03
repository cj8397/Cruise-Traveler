<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Sailing;

class UserEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('user_events')->delete();

        $firstUser = User::all()->first()->id;
        // $firstSailing = Sailing::all()->first()->id;
        $sailingID = 10;
        $eventID = 91;

        for($i = 1; $i < 7; $i++) {
            DB::table('user_events')->insert([
                'user_id' => 2,
                'sailing_id' => $sailingID,
                'event_id' => $i,
                'role' => 'Host'
            ]);
        }

        for($i = 1; $i < 7; $i++) {
            DB::table('user_events')->insert([
                'user_id' => 3,
                'sailing_id' => $sailingID,
                'event_id' => $i,
                'role' => 'Participant'
            ]);
        }

        //cant go up to 15
        for ($j = $firstUser + 3; $j < ($firstUser + 13); $j++) {
            DB::table('user_events')->insert([
                'user_id' => $j,
                'sailing_id' => $sailingID,
                'event_id' => $eventID,
                'role' => 'Participant'
            ]);
        }

    }
}
