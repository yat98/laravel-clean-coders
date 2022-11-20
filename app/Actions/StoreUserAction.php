<?php

namespace App\Actions;

use GuzzleHttp\Psr7\Request;

class StoreUserAction
{
    public function execute(Request $request): void
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user->generateAvatar();
        $this->dispatch(RegisterUserToNewsLetter::class);
    }
}