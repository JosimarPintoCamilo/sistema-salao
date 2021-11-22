<?php

namespace App\Services;

use App\Models\Professionals;

class CreateServices
{
    protected $professional;

    public function __construct(Professionals $professional)
    {
        $this->professional = $professional;
    }
    public function withNameAndDuration(string $name, int $duration)
    {
        $this->professional->services()
            ->create(['name'=>$name, 'duration' =>$duration]);
    }
}
