<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Contact;
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
        Role::create(['name' => 'customers']);

        $user = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'admin@example.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => date('Y-m-d H:i:s'),
            'gender' => 'male',
            'status' => 1

        ]);

        $contact = Contact::create([
            'phone' => "0000000000",
            'email' => "admin@example.com"
        ]);

        UserContact::create([
            'user_id' => $admin->id,
            'contact_id' => $contact->id,
            'primary' => true
        ]);

        $user->assignRole('admin');
    }
}
