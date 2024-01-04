<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert([
            [
                'id' => 1,
                'title' => 'System Admin',
            ],
            [
                'id' => 2,
                'title' => 'Admin',
            ],
            [
                'id' => 3,
                'title' => 'Manager',
            ],
            [
                'id' => 4,
                'title' => 'Customer',
            ],
        ]);
        \DB::table('permissions')->insert([
            [
                'id' => 1,
                'title' => 'create_customer',
            ],
            [
                'id' => 2,
                'title' => 'edit_customer',
            ],
            [
                'id' => 3,
                'title' => 'view_customer',
            ],
            [
                'id' => 4,
                'title' => 'delete_customer',
            ],
        ]);

        \DB::table('role_user')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'role_id' => 1,
            ],

        ]);


        \DB::table('permission_role')->insert([
            [
                'id' => 1,
                'permission_id' => 1,
                'role_id' => 1,
            ],
            [
                'id' => 2,
                'permission_id' => 2,
                'role_id' => 1,
            ],
            [
                'id' => 3,
                'permission_id' => 3,
                'role_id' => 1,
            ],
            [
                'id' => 4,
                'permission_id' => 4,
                'role_id' => 1,
            ],
        ]);
    }
}
