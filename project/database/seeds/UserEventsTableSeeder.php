<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Event;
use App\UserSailing;

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

        $hostID = User::where(['email'=>'eventhost@gmail.com'])->first()->id;


        $userSailings = UserSailing::all();
        $eventsHosted = [];
        foreach ($userSailings as $userSail) {
            $allEvents = Event::all()->where('sailing_id', $userSail->sailing_id)->pluck('id');
            $number = rand(2, 9);
            foreach ($allEvents as $event) {
                if ($hostID == $userSail->user_id) {
                    if ($event % 2 == 0) {
                        DB::table('user_events')->insert([
                            'user_id' => $userSail->user_id,
                            'sailing_id' => $userSail->sailing_id,
                            'event_id' => $event,
                            'role' => 'Host'
                        ]);
                        array_push($eventsHosted, $event);
                    } else {
                        DB::table('user_events')->insert([
                            'user_id' => $userSail->user_id,
                            'sailing_id' => $userSail->sailing_id,
                            'event_id' => $event,
                            'role' => 'Participant'
                        ]);
                    }
                } else {
                    if ($event % $number == 0) {
                        if (in_array($event, $eventsHosted)) {
                            DB::table('user_events')->insert([
                                'user_id' => $userSail->user_id,
                                'sailing_id' => $userSail->sailing_id,
                                'event_id' => $event,
                                'role' => 'Participant'
                            ]);
                        } else {
                            DB::table('user_events')->insert([
                                'user_id' => $userSail->user_id,
                                'sailing_id' => $userSail->sailing_id,
                                'event_id' => $event,
                                'role' => 'Host'
                            ]);
                        }
                    }
                }
            }
        }
    }
}
