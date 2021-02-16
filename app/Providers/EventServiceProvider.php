<?php

namespace App\Providers;

use App\Models\Asset;
use App\Models\Equity;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Liability;
use App\Observers\AssetObserver;
use App\Observers\EquityObserver;
use App\Observers\ExpenseObserver;
use App\Observers\IncomeObserver;
use App\Observers\LiabilityObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        Asset::observe(AssetObserver::class);
        Equity::observe(EquityObserver::class);
        Expense::observe(ExpenseObserver::class);
        Income::observe(IncomeObserver::class);
        Liability::observe(LiabilityObserver::class);
    }
}
