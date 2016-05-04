<?php

use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent\Model

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();


        $this->call(UsersTableSeeder::class);
        $this->call(UserDetailsTableSeeder::class);
        $this->call(SailingsTableSeeder::class);
        $this->call(UserSailingsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(UserEventsTableSeeder::class);
<<<<<<< HEAD
        $this->call(ThreadsTableSeeder::class);
=======
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b
        // Model::regaurd();
    }
}
