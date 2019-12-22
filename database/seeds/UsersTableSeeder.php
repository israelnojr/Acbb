<?php

use App\Role;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->delete();
        DB::table('role_user')->delete();

        $supserAdminRole = Role::where('name', 'superadmin')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $ZoneCodinatorRole = Role::where('name', 'zone_cordinator')->first();

        $supserAdmin = User::create([
            'name' => 'Super Admin',
            'username' => 'super-admin',
            'sponsor_user_id' => 1,
            'local_government_id' => 73,
            'state_of_origin' => 'anambra',
            'email' => 'super@admin.com',
            'password' => Hash::make('password')
        ]); 

        $admin = User::create([
            'name' => 'Admin User',
            'username' => 'admin-user',
            'sponsor_user_id' => 1,
            'local_government_id' => 73,
            'state_of_origin' => 'anambra',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'User User',
            'username' => 'user-user',
            'sponsor_user_id' => 1,
            'local_government_id' => 73,
            'state_of_origin' => 'anambra',
            'email' => 'user@user.com',
            'password' => Hash::make('password')
        ]);

        $cordinator = User::create([
            'name' => 'Cordinator User',
            'username' => 'cordinator-user',
            'sponsor_user_id' => 1,
            'local_government_id' => 73,
            'state_of_origin' => 'anambra',
            'email' => 'cordinator@cordinator.com',
            'password' => Hash::make('password')
        ]);

        $supserAdmin->roles()->attach($supserAdminRole);
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $cordinator->roles()->attach($ZoneCodinatorRole);
    }
}
