<?php

namespace App\Services;

use App\Interfaces\ExchangesRatesInterface;

class ExchangeRatesApiIO implements ExchangesRatesInterface
{
  public function getRate(string $from, string $to): float
  {
    $rate = 0.1;
    // Make call to exchangeratesapi.io API here

    return $rate;
  }
}