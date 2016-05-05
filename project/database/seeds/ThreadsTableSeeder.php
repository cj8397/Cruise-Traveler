<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Sailing;
use App\Event;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('threads')->delete();
        DB::table('messages')->delete();
        DB::table('participants')->delete();

        $sailings = Sailing::all();

        foreach($sailings as $sailing) {
                DB::table('threads')->insert([
                    'sailing_id' => $sailing->id,
                    'subject' => $sailing->title . ' Message Board',
                ]);
        }

        $events = Event::all();

        foreach($events as $event) {
                DB::table('threads')->insert([
                    'sailing_id' => $event->sailing_id,
                    'event_id' => $event->id,
                    'subject' => $event->title . ' Message Board',
                ]);
        }
    }
}
