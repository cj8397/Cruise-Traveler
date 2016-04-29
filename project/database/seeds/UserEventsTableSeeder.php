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

        //cant go up to 15
        for ($j = $firstUser; $j < ($firstUser + 10); $j++) {
            DB::table('user_events')->insert([
                'user_id' => $j,
                'sailing_id' => $sailingID,
                'event_id' => $eventID,
                'role' => 'participant'
            ]);
        }

    }
}
