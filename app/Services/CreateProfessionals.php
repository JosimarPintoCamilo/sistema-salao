<?php

namespace App\Services;

use App\Models\User;

class CreateProfessionals
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
