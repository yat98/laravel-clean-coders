<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\RegisterUserToNewsLetter;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user->generateAvatar();
        $this->dispatch(RegisterUserToNewsLetter::class);

        return redirect()->route('users.index');
    }

    public function unsubscribe(User $user)
    {
        $user->unsubscribeFromNewsLetter();

        return redirect()->route('users.index');
    }
}
