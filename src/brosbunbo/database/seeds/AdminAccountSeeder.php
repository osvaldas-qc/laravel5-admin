<?php
use Illuminate\Database\Seeder;
use BunBo\User;
use BunBo\Role;

class AdminAccountSeeder extends Seeder {

    public function run()
    {
        // Find current account with id = 1
        $user = User::with('roles')->find(1);

        // If exists, detach all roles and delete this user
        if(!empty($user)) {
            $roles = $user->roles;
            $user->detachRoles($roles);
            $user->delete();
        }

        // Create account
        $admin = User::create([
            'id' => 1,
            'name' => "Admin",
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);

        // Attach role
        $adminRole = Role::where('name', 'admin')->first();
        $admin->attachRole($adminRole);
    }
}