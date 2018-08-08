<?php

namespace App\Observers;

use App\Nomination;
use App\Notifications\BeenNominated;

class NominationObserver
{
    /**
     * Handle to the nomination "created" event.
     *
     * @param  \App\Nomination  $nomination
     * @return void
     */
    public function created(Nomination $nomination)
    {
        $user = $nomination->nominee->user;

        $user->notify(new BeenNominated($nomination));

    }

    /**
     * Handle the nomination "updated" event.
     *
     * @param  \App\Nomination  $nomination
     * @return void
     */
    public function updated(Nomination $nomination)
    {
        //
    }

    /**
     * Handle the nomination "deleted" event.
     *
     * @param  \App\Nomination  $nomination
     * @return void
     */
    public function deleted(Nomination $nomination)
    {
        //
    }
}
