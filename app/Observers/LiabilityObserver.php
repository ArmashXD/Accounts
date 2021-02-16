<?php

namespace App\Observers;

use App\Models\Liability;
use Illuminate\Support\Str;

class LiabilityObserver
{

    public function creating(Liability $liability)
    {
        $liability->guid = Str::uuid();
    }
    /**
     * Handle the Liability "created" event.
     *
     * @param  \App\Models\Liability  $liability
     * @return void
     */
    public function created(Liability $liability)
    {
        //
    }

    /**
     * Handle the Liability "updated" event.
     *
     * @param  \App\Models\Liability  $liability
     * @return void
     */
    public function updated(Liability $liability)
    {
        //
    }

    /**
     * Handle the Liability "deleted" event.
     *
     * @param  \App\Models\Liability  $liability
     * @return void
     */
    public function deleted(Liability $liability)
    {
        //
    }

    /**
     * Handle the Liability "restored" event.
     *
     * @param  \App\Models\Liability  $liability
     * @return void
     */
    public function restored(Liability $liability)
    {
        //
    }

    /**
     * Handle the Liability "force deleted" event.
     *
     * @param  \App\Models\Liability  $liability
     * @return void
     */
    public function forceDeleted(Liability $liability)
    {
        //
    }
}
