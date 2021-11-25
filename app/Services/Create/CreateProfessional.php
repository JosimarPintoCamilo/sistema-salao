<?php

namespace App\Services\Create;

use App\Models\User;

class CreateProfessional
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function withName(string $name)
    {
        $this->user->professionals()
            ->create(['name'=>$name]);
    }
}
