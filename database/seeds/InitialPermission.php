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

        /* Customers Permission */
        Permission::create(['name' => 'customer_all']);
        Permission::create(['name' => 'customer_add']);
        Permission::create(['name' => 'customer_view']);
        Permission::create(['name' => 'customer_edit']);
        Permission::create(['name' => 'customer_delete']);
    }
}
