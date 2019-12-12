<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loan;
use App\accreditation;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Carbon\Carbon::setLocale('mn');
         accreditation::whereDate('end', '<', Carbon::now())->update(array('status' => 3));
         loan::whereDate('end', '<', Carbon::now())->update(array('status' => 3));
    }
}
