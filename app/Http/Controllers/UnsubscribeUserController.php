<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnsubscribeUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user->unsubscribeFromNewsLetter();

        return redirect()->route('users.index');
    }
}
