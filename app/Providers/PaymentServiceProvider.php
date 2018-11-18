<?php

namespace App\Providers;

use App\Services\Payment\Payment;
use Illuminate\Support\ServiceProvider;
use App\Services\Payment\Providers\StripeProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Payment::class, function ($app) {
            return new Payment(new StripeProvider());
        });
    }
}
