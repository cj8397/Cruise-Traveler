<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'email' => 'vacationer@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $faker = Faker::create();
        foreach(range(1,11) as $i) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'password' => bcrypt('password'),
            ]);
        }
    }
}
