<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Address;
use App\Models\Contact;
use App\Models\UserAddress;
use App\Models\UserContact;
use App\User;


class Installation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'access_all']);

        $admin = Role::create(['name' => 'admin', 'guard_name' => 'api'])->givePermissionTo(['access_all']);
        Role::create(['name' => 'merchant']);
        Role::create(['name' => 'passenger']);
        Role::create(['name' => 'employee']);

        Country::create([
            'name' => 'Pakistan'

        ]);

        State::create([
            'name' => 'Sindh',
            'country_id' => 1

        ]);

        City::create([
            'name' => 'Karachi',
            'state_id' => 1,
            'country_id' => 1,

        ]);

        $user = User::create([
            'name' => 'Admin',
            'father_name' => 'Admin',
            'username' => 'admin@travelinsurance.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'cnic' => '1234567890123',
            'gender' => 'M',
            'dob'=> date('Y-m-d'),
            'status' => 1

        ]);

        $address = Address::create([
            'full_address' => 'Minibigtech, Syed Altaf Ali Barelvi Rd,، Block 2 Nazimabad',
            'city_id' => 1,
            'state_id' => 1,
            'country_id' => 1,
            'latitude' => 24.90199,
            'longitude' => 67.0324387
        ]);

        UserAddress::create([
            'user_id' => $admin->id,
            'address_id' => $address->id,
            'primary' => true
        ]);

        $contact = Contact::create([
            'phone' => "3330000000",
            'email' => "admin@travelinsurance.com"
        ]);

        UserContact::create([
            'user_id' => $admin->id,
            'contact_id' => $contact->id,
            'primary' => true
        ]);

        $user->assignRole('admin');
    }
}
