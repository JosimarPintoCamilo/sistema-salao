<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\User;

class CreateCustomer
{
    public function create(string $name, string $telephone = null)
    {
        $customer = Customer::firstOrCreate(['name' => $name, 'telephone' => $telephone]);
        return $customer->id;
    }
}
