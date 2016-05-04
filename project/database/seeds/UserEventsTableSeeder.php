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

        $vacationID = User::where(['email'=>'vacation@gmail.com'])->first()->id;
        $hostID = User::where(['email'=>'eventhost@gmail.com'])->first()->id;
        $participantID = User::where(['email'=>'eventparticipant@gmail.com'])->first()->id;

        for($i = 1; $i < 7; $i++) {
            DB::table('user_events')->insert([
                'user_id' => $vacationID,
                'sailing_id' => $sailingID,
                'event_id' => $i,
                'role' => 'Participant'
            ]);
        }

        for($i = 1; $i < 7; $i++) {
            DB::table('user_events')->insert([
                'user_id' => $hostID,
                'sailing_id' => $sailingID,
                'event_id' => $i,
                'role' => 'Host'
            ]);
        }

        for($i = 1; $i < 7; $i++) {
            DB::table('user_events')->insert([
                'user_id' => $participantID,
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
