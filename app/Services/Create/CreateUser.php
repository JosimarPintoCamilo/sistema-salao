<?php

namespace App\Services\Create;

use App\Models\User;

class CreateUser
{
    public function withEmail(string $email)
    {
        $user = User::where('email', $email)->first();

        if (! $user) {
            $user = User::create(['email'=>$email]);
            $user->notebook()->create();
        }

        return $user;
    }
}
