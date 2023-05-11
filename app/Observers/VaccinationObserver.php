<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Vaccination;
use App\Notifications\ArticleNotification;

class VaccinationObserver
{
    /**
     * Handle the Vaccination "created" event.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return void
     */
    public function created(Vaccination $vaccination)
    {
        $users = User::where('device_token', '!=', null)->get();

        foreach ($users as $key => $user) {
            $user->notify(new ArticleNotification($vaccination));
        }
    }

    /**
     * Handle the Vaccination "updated" event.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return void
     */
    public function updated(Vaccination $vaccination)
    {
        //
    }

    /**
     * Handle the Vaccination "deleted" event.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return void
     */
    public function deleted(Vaccination $vaccination)
    {
        //
    }

    /**
     * Handle the Vaccination "restored" event.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return void
     */
    public function restored(Vaccination $vaccination)
    {
        //
    }

    /**
     * Handle the Vaccination "force deleted" event.
     *
     * @param  \App\Models\Vaccination  $vaccination
     * @return void
     */
    public function forceDeleted(Vaccination $vaccination)
    {
        //
    }
}
