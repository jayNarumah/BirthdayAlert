<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\UserType;
use \App\Models\Profile;
use \App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserType::create(
            [
                'type' => 'Super Admin',
            ]
        );
        UserType::create(
            [
                'type' => 'Admin',
            ]
        );
        UserType::create(
            [
                'type' => 'User',
            ]
        );

        Profile::create(
            [
                'name' => 'Super Admin',
                'dob' => now(),
                'gender' => 'Male',
                'email' => 'super@demo.com',
                'phone_number' => '07066352444'
            ]);
            Group::create(
                [
                    'group_name' => 'Default Group',

                ]);
        $this->call([
            // ProfileSeeder::class,
            // GroupSeeder::class,
            UserSeeder::class,
            // GroupMemberSeeder::class,


        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
