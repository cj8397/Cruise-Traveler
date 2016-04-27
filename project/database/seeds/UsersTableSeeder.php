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
        $faker = Faker::create();
        DB::table('users')->insert([
            'email' => 'vacation@gmail.com',
            'password' => bcrypt('password'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now'),
        ]);

        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminpassword'),
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now'),
        ]);

        foreach(range(1,100) as $i) {
            DB::table('users')->insert([
                'email' => $faker->email,
                'password' => bcrypt('password'),
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now'),
            ]);
        }
    }
}
