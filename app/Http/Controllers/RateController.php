<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Interfaces\ExchangesRatesInterface;

class RateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(
        Request $request,
        ExchangesRatesInterface $exchangesRatesInterfaces
    ): JsonResponse
    {
        $rate = $exchangesRatesInterfaces->getRate(
            $request->from,
            $request->to,
        );

        return response()->json(['rate' => $rate]);
    }
}
