<?php


namespace App\Http\Services;

use App\Models\Customer;

class CustomerService
{
    public static function store($user)
    {
        $customer = [];
        $customer = $user->customer()->create($customer);

        return $customer;
    }
}
