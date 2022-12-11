<?php

namespace App\Providers;

use App\Services\ExchangeRatesApiIO;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ExchangesRatesInterface;

class ExchangesRatesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ExchangesRatesInterface::class,
            ExchangeRatesApiIO::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
