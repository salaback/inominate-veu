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
            ->create([
                'email' => 'user@test.com',
                'password' => \Illuminate\Support\Facades\Hash::make('123456')]
            );
        $nominee = factory(\App\Nominee::class)->create();
        $nomination = factory(\App\Nomination::class)->create(['nominee_id' => $nominee->id]);
        $support = factory(\App\NominationSupport::class)->create(['user_id' => $user->id, 'nomination_id' => $nomination->id]);

    }
}
