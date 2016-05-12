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
        $firstUser = User::all()->first()->id;
        $firstSailing = Sailing::all()->first()->id;
        $lastSailing = Sailing::all()->last()->id;
        //pluck all user ids and sailing ids to loop through them
        $allUsers = User::pluck('id')->toArray();
        $allSailings = Sailing::pluck('id')->toArray();
        //looping has begun
        $count = 0;
        foreach ($allSailings as $sailing) {
            $count = rand(2, 9);
            foreach ($allUsers as $user) {
                if ($user % $count == 0) {
                    DB::table('user_sailings')->insert([
                        'user_id' => $user,
                        'sailing_id' => $sailing
                    ]);
                }
            }
        }
        //looping has ended
    }
}
