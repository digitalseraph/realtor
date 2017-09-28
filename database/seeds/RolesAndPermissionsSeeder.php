<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        /**
         *  Create Permissions
         */
        // Users
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete users']);
        // Admins
        Permission::create(['name' => 'view admins']);
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'edit admins']);
        Permission::create(['name' => 'delete admins']);
        Permission::create(['guard_name' => 'admin', 'name' => 'view admins']);
        Permission::create(['guard_name' => 'admin', 'name' => 'create admins']);
        Permission::create(['guard_name' => 'admin', 'name' => 'edit admins']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete admins']);

        /**
         * Create Roles and Assign Permissions
         */
        // super_admin
        $roleSuperAdmin = Role::create([
            'guard_name' => 'admin',
            'name' => 'super_admin'
        ]);
        $roleSuperAdmin->givePermissionTo('view users');
        $roleSuperAdmin->givePermissionTo('create users');
        $roleSuperAdmin->givePermissionTo('edit users');
        $roleSuperAdmin->givePermissionTo('delete users');
        $roleSuperAdmin->givePermissionTo('view admins');
        $roleSuperAdmin->givePermissionTo('create admins');
        $roleSuperAdmin->givePermissionTo('edit admins');
        $roleSuperAdmin->givePermissionTo('delete admins');

        // admin
        $roleAdmin = Role::create([
            'guard_name' => 'admin',
            'name' => 'admin'
        ]);
        $roleAdmin->givePermissionTo('view users');
        $roleAdmin->givePermissionTo('create users');
        $roleAdmin->givePermissionTo('edit users');
        $roleAdmin->givePermissionTo('delete users');

        // user
        $roleUser = Role::create([
            'guard_name' => 'web',
            'name' => 'user'
        ]);
        $roleUser->givePermissionTo('view users');
        $roleUser->givePermissionTo('view admins');
    }
}
