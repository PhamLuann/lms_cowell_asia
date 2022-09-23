<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_users')->truncate();
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
            ],
            [
                'name' => 'User',
                'slug' => 'user',
            ],
        ];

        Role::insert($roles);

        $users = [
            [
                'first_name' => fake()->name(),
                'email' => 'admin@example.com',
                'birthday' => fake()->date(),
                'address' => fake()->address(),
            ],
            [
                'email' => 'editor@example.com',
                'birthday' => fake()->date(),
                'address' => fake()->address(),
            ],
            [
                'email' => 'user@example.com',
                'birthday' => fake()->date(),
                'address' => fake()->address(),
            ],
        ];

        foreach ($users as $userItem)
        {
            //$user  =  \App\Models\User::factory()->create($userItem);
            $userItem['password'] = '1234567@';
            $user = Sentinel::registerAndActivate($userItem);
            switch ($userItem['email'])
            {
                case 'admin@example.com':
                    $role = Sentinel::findRoleBySlug('admin');
                    $role->users()->attach($user);
                    break;
                case 'editor@example.com':
                    $role = Sentinel::findRoleBySlug('editor');
                    $role->users()->attach($user);
                    break;
                case 'user@example.com':
                    $role = Sentinel::findRoleBySlug('user');
                    $role->users()->attach($user);
                    break;
            }
        }
    }
}

