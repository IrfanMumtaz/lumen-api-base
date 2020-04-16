<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class InitialPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /* ACL Permissions */
        Permission::create(['name' => 'acl_all']);
        Permission::create(['name' => 'acl_add']);
        Permission::create(['name' => 'acl_view']);
        Permission::create(['name' => 'acl_edit']);
        Permission::create(['name' => 'acl_delete']);

        /* Vehicle Permission */
        Permission::create(['name' => 'vehicle_all']);
        Permission::create(['name' => 'vehicle_add']);
        Permission::create(['name' => 'vehicle_view']);
        Permission::create(['name' => 'vehicle_edit']);
        Permission::create(['name' => 'vehicle_delete']);

        /* Merchant Permission */
        Permission::create(['name' => 'merchant_all']);
        Permission::create(['name' => 'merchant_add']);
        Permission::create(['name' => 'merchant_view']);
        Permission::create(['name' => 'merchant_edit']);
        Permission::create(['name' => 'merchant_delete']);

        /* Passenger Permission */
        Permission::create(['name' => 'passenger_all']);
        Permission::create(['name' => 'passenger_add']);
        Permission::create(['name' => 'passenger_view']);
        Permission::create(['name' => 'passenger_edit']);
        Permission::create(['name' => 'passenger_delete']);

        /* Booth Permission */
        Permission::create(['name' => 'booth_all']);
        Permission::create(['name' => 'booth_add']);
        Permission::create(['name' => 'booth_view']);
        Permission::create(['name' => 'booth_edit']);
        Permission::create(['name' => 'booth_delete']);

        /* Ticket Permission */
        Permission::create(['name' => 'ticket_all']);
        Permission::create(['name' => 'ticket_add']);
        Permission::create(['name' => 'ticket_view']);
        Permission::create(['name' => 'ticket_edit']);
        Permission::create(['name' => 'ticket_delete']);
    }
}
