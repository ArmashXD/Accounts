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

        $permissions = [
            'main-category-edit',
            'main-category-delete',
            'main-category-show',
            'main-category-create',
            'category-edit',
            'category-delete',
            'category-show',
            'category-create',
            'asset-create',
            'asset-show',
            'asset-delete',
            'asset-edit',
            'liability-show',
            'liability-delete',
            'liability-edit',
            'liability-create',
            'equity-show',
            'equity-delete',
            'equity-edit',
            'equity-create',
            'income-create',
            'income-delete',
            'income-edit',
            'income-show',
            'expense-show',
            'expense-delete',
            'expense-edit',
            'expense-create',
            'supplier-show',
            'supplier-delete',
            'supplier-edit',
            'supplier-create',
            'ledger-show',
            'ledger-delete',
            'ledger-edit',
            'ledger-create',
            'tax-show',
            'tax-delete',
            'tax-edit',
            'tax-create',
            'product-show',
            'product-delete',
            'product-edit',
            'product-create',
            'unit-show',
            'unit-delete',
            'unit-edit',
            'unit-create',
            'purchases-show',
            'purchases-delete',
            'purchases-edit',
            'purchases-create',
            'view',
            'edit',
            'delete',
            'show',
            'create',
            'check',
        ];

        // create permissions
        foreach ($permissions as $item)
        {
            Permission::create(['name' => $item]);
        }

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('show');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('show');
        $role2->givePermissionTo('create');
        $role2->givePermissionTo('edit');
        $role2->givePermissionTo('delete');

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo(Permission::all());

        // gets all permissions

        // create demo users
        $user = \App\Models\User::create([
            'name' => 'user',
            'email' => 'test@example.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret'
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret'
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('secret'),
            'o_auth' => 'secret'
        ]);
        $user->assignRole($role3);
    }
}
