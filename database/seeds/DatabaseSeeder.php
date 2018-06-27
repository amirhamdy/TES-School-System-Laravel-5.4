<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->delete();

        $role = ['name' => 'admin', 'display_name' => 'Admin', 'description' => 'Full Permission'];
        $role = Role::create($role);
        $permission = Permission::get();
        foreach ($permission as $key => $value) {
            $role->attachPermission($value);
        }
        $user = ['name' => 'Administrator', 'email' => 'admin@test.com', 'password' => Hash::make('123456')];
        $user = User::create($user);
        $user->attachRole($role);

        //1) Create Professor Role
        $role = ['name' => 'professor', 'display_name' => 'Professor', 'description' => 'Course Permission'];
        $role = Role::create($role);

        $user = ['name' => 'Amir Hamdy', 'email' => 'professor_01@test.com', 'password' => Hash::make('123456')];
        $user = User::create($user);
        $user->attachRole($role);

        $user = ['name' => 'Ahmed Hamdy', 'email' => 'professor_02@test.com', 'password' => Hash::make('123456')];
        $user = User::create($user);
        $user->attachRole($role);

        //1) Create Student Role
        $role = ['name' => 'student', 'display_name' => 'Student', 'description' => 'Student Permission'];
        $role = Role::create($role);

        $user = ['name' => 'Raghda Ali', 'email' => 'student_01@test.com', 'password' => Hash::make('123456')];
        $user = User::create($user);
        $user->attachRole($role);

        $user = ['name' => 'Eman Sobhy', 'email' => 'student_02@test.com', 'password' => Hash::make('123456')];
        $user = User::create($user);
        $user->attachRole($role);

        //1) Create Parent Role
        $role = ['name' => 'parent', 'display_name' => 'Parent', 'description' => 'Parent Permission'];
        $role = Role::create($role);

        $user = ['name' => 'Ali Hamid', 'email' => 'parent_01@test.com', 'password' => Hash::make('123456')];
        $user = User::create($user);
        $user->attachRole($role);

        $this->call(PermissionSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(ParentSeeder::class);
        $this->call(QuestionSeeder::class);
    }
}