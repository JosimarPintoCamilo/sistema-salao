<?php

namespace App\Services;

use App\Models\Professional;

class CreateServices
{
    protected $professional;

    public function __construct(Professional $professional)
    {
        $this->professional = $professional;
    }
    public function withNameAndDuration(string $name, int $duration)
    {
        $this->professional->services()
            ->create(['name'=>$name, 'duration' =>$duration]);
    }
}
