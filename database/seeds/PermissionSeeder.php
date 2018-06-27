<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'profile-view',
                'display_name' => 'View Profile',
                'description' => 'View Profile Information'
            ],
            [
                'name' => 'profile-update',
                'display_name' => 'Update Profile',
                'description' => 'Update Profile Information'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'List All Roles'
            ],
            [
                'name' => 'role-update',
                'display_name' => 'Update Role',
                'description' => 'Update Role Information'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'user-create',
                'display_name' => 'Create User',
                'description' => 'Create New User'
            ],
            [
                'name' => 'user-list',
                'display_name' => 'Display User Listing',
                'description' => 'List All Users'
            ],
            [
                'name' => 'user-update',
                'display_name' => 'Update User',
                'description' => 'Update User Information'
            ],
            [
                'name' => 'user-delete',
                'display_name' => 'Delete User',
                'description' => 'Delete User'
            ],
            [
                'name' => 'professor-create',
                'display_name' => 'Create Professor',
                'description' => 'Create New Professor'
            ],
            [
                'name' => 'professor-list',
                'display_name' => 'Display Professor Listing',
                'description' => 'List All Professors'
            ],
            [
                'name' => 'professor-update',
                'display_name' => 'Update Professor',
                'description' => 'Update Professor Information'
            ],
            [
                'name' => 'professor-delete',
                'display_name' => 'Delete Professor',
                'description' => 'Delete Professor Information'
            ],
            [
                'name' => 'course-create',
                'display_name' => 'Create Course',
                'description' => 'Create New Course'
            ],
            [
                'name' => 'course-list',
                'display_name' => 'Display Course Listing',
                'description' => 'List All Courses'
            ],
            [
                'name' => 'course-update',
                'display_name' => 'Update Course',
                'description' => 'Update Course Information'
            ],
            [
                'name' => 'course-delete',
                'display_name' => 'Delete Course',
                'description' => 'Delete Course Information'
            ]
        ];
        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}