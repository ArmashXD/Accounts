<?php

namespace App\Providers;

use App\Models\Asset;
use App\Models\Customer;
use App\Models\Equity;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Liability;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Tax;
use App\Models\Unit;
use App\Observers\AssetObserver;
use App\Observers\CustomerObserver;
use App\Observers\EquityObserver;
use App\Observers\ExpenseObserver;
use App\Observers\IncomeObserver;
use App\Observers\LiabilityObserver;
use App\Observers\MainCategoryObserver;
use App\Observers\ProductObserver;
use App\Observers\SupplierObserver;
use App\Observers\TaxObserver;
use App\Observers\UnitObserver;
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
    }
}
