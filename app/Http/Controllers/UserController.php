<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Actions\StoreUserAction;
use App\Jobs\RegisterUserToNewsLetter;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function store(StoreUserRequest $request, StoreUserAction $storeUserAction)
    {
        $storeUserAction->execute($request->toDTO());

        return redirect()->route('users.index');
    }
}
