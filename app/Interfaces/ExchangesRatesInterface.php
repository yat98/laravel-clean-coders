<?php

namespace App\Interfaces;

interface ExchangesRatesInterface
{
  public function getRate(string $from, string $to): float;
}