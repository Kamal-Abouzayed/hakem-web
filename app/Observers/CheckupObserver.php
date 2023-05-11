<?php

namespace App\Observers;

use App\Models\Checkup;
use App\Models\User;
use App\Notifications\ArticleNotification;

class CheckupObserver
{
    /**
     * Handle the Checkup "created" event.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return void
     */
    public function created(Checkup $checkup)
    {
        $users = User::where('device_token', '!=', null)->get();

        foreach ($users as $key => $user) {
            $user->notify(new ArticleNotification($checkup));
        }
    }

    /**
     * Handle the Checkup "updated" event.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return void
     */
    public function updated(Checkup $checkup)
    {
        //
    }

    /**
     * Handle the Checkup "deleted" event.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return void
     */
    public function deleted(Checkup $checkup)
    {
        //
    }

    /**
     * Handle the Checkup "restored" event.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return void
     */
    public function restored(Checkup $checkup)
    {
        //
    }

    /**
     * Handle the Checkup "force deleted" event.
     *
     * @param  \App\Models\Checkup  $checkup
     * @return void
     */
    public function forceDeleted(Checkup $checkup)
    {
        //
    }
}
