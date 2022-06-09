<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions for users
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'register user']);
        Permission::create(['name' => 'deregister user']);

        // create permissions for salesman
        Permission::create(['name' => 'create order']);
        Permission::create(['name' => 'read order']);
        Permission::create(['name' => 'deregister salesman']);        
        

        $role1 = Role::create(['name' => 'Super-Admin']);
        $role1->givePermissionTo('create user');
        $role1->givePermissionTo('read user');
        $role1->givePermissionTo('update user');
        $role1->givePermissionTo('register user');
        $role1->givePermissionTo('deregister user');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create user');
        $role2->givePermissionTo('read user');
        $role2->givePermissionTo('update user');
        $role2->givePermissionTo('register user');
        $role2->givePermissionTo('deregister user');

        $role3 = Role::create(['name' => 'vendedor']);
        $role3->givePermissionTo('create order');
        $role3->givePermissionTo('read order');
        $role3->givePermissionTo('deregister salesman');
        
        User::create([
            'id' => 1,
            'branch_id' => 1,
            'name' => 'Administrador',
            'ci' => '8574924',
            'address' => 'address xxx',
            'telephone' => '9854624',
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ])->assignRole($role1);
        /* Farmacia 2 */
        User::create([
            'id' => 2,
            'branch_id' => 2,
            'name' => 'Admin farmacia',
            'ci' => '548667',
            'address' => 'address xx',
            'telephone' => '96584724',
            'username' => 'farmacia',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ])->assignRole($role2);
        User::create([
            'id' => 3,
            'branch_id' => 2,
            'name' => 'vendedor',
            'ci' => '548667',
            'address' => 'address xx',
            'telephone' => '96584724',
            'username' => 'vendedor',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ])->assignRole($role3);
        /* Farmacia 4 */
        User::create([
            'id' => 4,
            'branch_id' => 4,
            'name' => 'Admin farmacia4',
            'ci' => '3647867',
            'address' => 'address xx',
            'telephone' => '4322724',
            'username' => 'farmacia4',
            'password' => Hash::make('1234567'),
            'email_verified_at' => now(),
        ])->assignRole($role2);
        User::create([
            'id' => 5,
            'branch_id' => 4,
            'name' => 'vendedor4',
            'ci' => '2548667',
            'address' => 'address xx',
            'telephone' => '34574724',
            'username' => 'vendedor4',
            'password' => Hash::make('1234567'),
            'email_verified_at' => now(),
        ])->assignRole($role3);
    }
}