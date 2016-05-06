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
        DB::table('user_events')->delete();

        $vacationID = User::where(['email'=>'vacation@gmail.com'])->first()->id;
        $hostID = User::where(['email'=>'eventhost@gmail.com'])->first()->id;
        $participantID = User::where(['email'=>'eventparticipant@gmail.com'])->first()->id;

        $firstSailing = Sailing::all()->first()->id;
        $lastSailing = Sailing::all()->last()->id;

        for($i = $firstSailing; $i < $lastSailing; $i++) {
            for($j = 1; $j <= 10; $j++) {
                DB::table('user_events')->insert([
                    'user_id' => $vacationID,
                    'sailing_id' => $i,
                    'event_id' => $j,
                    'role' => 'Participant'
                ]);

                DB::table('user_events')->insert([
                    'user_id' => $hostID,
                    'sailing_id' => $i,
                    'event_id' => $j,
                    'role' => 'Host'
                ]);

                DB::table('user_events')->insert([
                    'user_id' => $participantID,
                    'sailing_id' => $i,
                    'event_id' => $j,
                    'role' => 'Participant'
                ]);
            }
        }



    }
}
