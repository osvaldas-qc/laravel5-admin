<?php
use Illuminate\Database\Seeder;
use BunBo\Role;

class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->truncate();

        // Admin
        Role::create([
            'name' => 'admin',
            'display_name' => 'Admin',
            'description' => 'Master Admin'
        ]);

        // User
        Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Normal User'
        ]);
    }
}