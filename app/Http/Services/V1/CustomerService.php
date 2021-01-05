<?php


namespace App\Http\Services\V1;

class CustomerService
{
    public static function store($user)
    {
        $customer = [];
        $customer = $user->customer()->create($customer);

        return $customer;
    }
}
