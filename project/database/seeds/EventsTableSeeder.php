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

        $string = 'Slot Tournament - Casino Royale,13:00,23:59,,Casino Royale (Deck 6),
Diamond & Gemstone Seminar,13:30,14:00,,Deck 13,
Ice Carving Demonstration,15:00,16:00,,Poolside (Deck 11),
Pathway To Yoga,17:00,18:00,,ShipShape Center (Deck 12),
Big Band Dance Music,17:30,18:30,,Colony Club (Deck 6),
Cigar Aficionados,22:00,23:59,,Sky Bar (Deck 12),
Singles Mix Mingle,20:00,23:00,,Centrum,
PHOTO TIME: ELEGANT,16:00,18:00,"It�۪s not often you dress up in your finest digs. Let us capture the moment - give us your best smile and say ���cheese!�۝",Promenade & Lobby,
KARAOKE AWESOME,21:00,23:59,"Maybe it�۪s a song you choos maybe not. The bottom line is you feel the music and let it take you over.","Alfred�۪s, 4 Mid",
PARTY LIKE IT�۪S 1980,22:00,23:00,"Hop on the flashback train for a good ol�۪ fashioned 80۪s party. Break out those parachute pants big hair and anything else from the 80�۪s and let�۪s rock!","Henri�۪s, 5 Mid",
Sudoku and Brainteasers,8:00,11:00,,"Library, Deck 7 Aft",
Detox for Health and Weight Loss,11:00,13:00,Discover the best way to get rid of vour stubborn belly fat,"Fitness Center, Deck 17 Aft",
Faclal Workshop: Ladies Pamper Party,13:30,15:00,calling all ladies to attend the pampering event of the cruise. Join us for skin specific or luxury skin knowledqe advice tips and free samples,"Lotus Spa, Deck 5 Fwd",
Chocolate Journeys Pastry Demonstration,14:00,15:00,,Deck 7,';

        $data = str_getcsv($string, "\n");

        $faker = Faker::create();
        foreach ($data as $row) {
            $eventInfo = explode(",", $row);
            // 12 sailings right now
            foreach (range($first, $last) as $i) {
                DB::table('events')->insert([
                    'sailing_id' => $i,
                    'title' => $eventInfo[0],
                    'start_date' => $faker->dateTimeBetween($startDate = '+30 days', $endDate = '+60 days'),
                    'end_date' => $faker->dateTimeBetween($startDate = '+60 days', $endDate = '+90 days'),
                    'desc' => $eventInfo[3],
                    'location' => $eventInfo[4],
                    'max_participants' => 15
                ]);
            }
        }
    }
}