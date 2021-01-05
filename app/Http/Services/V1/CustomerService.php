<?php


namespace App\Http\Services\V1;

use App\User;

class CustomerService
{
    public static function store(User $user)
    {
        $customer = [];
        $customer = $user->customer()->create($customer);

        return $customer;
    }
}
