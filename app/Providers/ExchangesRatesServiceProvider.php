<?php

namespace App\Providers;

use Exception;
use App\Services\FixerApiIO;
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
        // $this->app->bind(
        //     ExchangesRatesInterface::class,
        //     ExchangeRatesApiIO::class
        // );

        $this->app->bind(ExchangesRatesInterface::class, function($app) {
            $driver = config('services.exchange-rate-driver');

            if($driver == 'exchangeratesapiio'){
                return new ExchangeRatesApiIO();
            }

            if($driver == 'fixerapiio'){
                return new FixerApiIO();
            }

            throw new Exception('The exchange rates driver is invalid');
        });
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
