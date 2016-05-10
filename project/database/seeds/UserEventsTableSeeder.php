<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;

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

        $firstEvent = Event::all()->first()->id;
        $lastEvent = Event::all()->last()->id;

        for($i = $firstEvent; $i < $lastEvent; $i++) {
          $currEvent = Event::find($i);
            if($i % 3 == 0) {
                DB::table('user_events')->insert([
                    'user_id' => $vacationID,
                    'sailing_id' => $currEvent->sailing_id,
                    'event_id' => $i,
                    'role' => 'Participant'
                ]);
            }

            DB::table('user_events')->insert([
                'user_id' => $hostID,
                'sailing_id' => $currEvent->sailing_id,
                'event_id' => $i,
                'role' => 'Host'
            ]);

            DB::table('user_events')->insert([
                'user_id' => $participantID,
                'sailing_id' => $currEvent->sailing_id,
                'event_id' => $i,
                'role' => 'Participant'
            ]);
        }



    }
}
