<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Jobs\RegisterUserToNewsLetter;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        $request->validate([
            'name' => 'string|required|max:50',
            'email' => 'email|required|unique:users',
            'password' => 'string|required|confirmed',
        ]);

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
