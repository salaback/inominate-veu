<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // generate test user
        $user = factory(\App\User::class)
            ->make([
                'email' => 'user@test.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456')]
            );

        $nomination = factory(\App\Nomination::class)->make();


    }
}
