<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //// Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'show']);
        Permission::create(['name' => 'create']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('edit');
        $role1->givePermissionTo('delete');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('show');
        $role2->givePermissionTo('create');
        $role2->givePermissionTo('edit');
        $role2->givePermissionTo('delete');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::create([
            'name' => 'Example User',
            'email' => 'test@example.com',
            'password' => bcrypt('secret')
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::create([
            'name' => 'Example Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('secret')
        ]);
        $user->assignRole($role3);
    }
}
