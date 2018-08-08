<?php

namespace App\Observers;

use App\Nominee;
use function Sodium\randombytes_random16;

class NomineeObserver
{
    /**
     * Handle to the nominee "created" event.
     *
     * @param  \App\Nominee  $nominee
     * @return void
     */
    public function created(Nominee $nominee)
    {
        // Check if nominee has a user
        if($nominee->user_id == null)
        {
            $nominee->user()->create(['email' => $nominee->email, 'password' => str_random(32)]);
        }

    }

    /**
     * Handle the nominee "updated" event.
     *
     * @param  \App\Nominee  $nominee
     * @return void
     */
    public function updated(Nominee $nominee)
    {
        //
    }

    /**
     * Handle the nominee "deleted" event.
     *
     * @param  \App\Nominee  $nominee
     * @return void
     */
    public function deleted(Nominee $nominee)
    {
        //
    }
}
