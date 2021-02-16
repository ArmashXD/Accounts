<?php

namespace App\Observers;

use App\Models\Equity;
use Illuminate\Support\Str;

class EquityObserver
{

    public function creating(Equity $equity)
    {
        $equity->guid = Str::uuid();
    }
    /**
     * Handle the Equity "created" event.
     *
     * @param  \App\Models\Equity  $equity
     * @return void
     */
    public function created(Equity $equity)
    {
        //
    }

    /**
     * Handle the Equity "updated" event.
     *
     * @param  \App\Models\Equity  $equity
     * @return void
     */
    public function updated(Equity $equity)
    {
        //
    }

    /**
     * Handle the Equity "deleted" event.
     *
     * @param  \App\Models\Equity  $equity
     * @return void
     */
    public function deleted(Equity $equity)
    {
        //
    }

    /**
     * Handle the Equity "restored" event.
     *
     * @param  \App\Models\Equity  $equity
     * @return void
     */
    public function restored(Equity $equity)
    {
        //
    }

    /**
     * Handle the Equity "force deleted" event.
     *
     * @param  \App\Models\Equity  $equity
     * @return void
     */
    public function forceDeleted(Equity $equity)
    {
        //
    }
}
