<?php

namespace App\Services;

use App\Models\User;

class UpdateCodeVerificationUser
{
    public function update(int $userCode)
    {
        $code = mt_rand(1000, 9999);
        $user = User::findOrFail($userCode);

        $user->verification_code = $code;
        $user->save();
    }
}
