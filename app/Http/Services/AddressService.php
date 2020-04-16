<?php


namespace App\Http\Services;


use App\Models\Address;
use App\Models\UserAddress;

class AddressService
{
    public function store($_address)
    {
        $address = new Address();
        $address->full_address = $_address['full'];
        $address->latitude = $_address['latitude'];
        $address->longitude = $_address['longitude'];
        $address->city_id = !empty($_address['city']) ?: null;
        $address->state_id = !empty($_address['state']) ?: null;
        $address->country_id = !empty($_address['country']) ?: 1;
        $address->save();

        return $address;
    }

    public function userAddress($user, $address, $primary = false)
    {
        $ua = new UserAddress();
        $ua->user_id = $user->id;
        $ua->address_id = $address->id;
        $ua->primary = $primary;
        $ua->save();

        return $ua;
    }
}
