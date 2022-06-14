<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\UserType;
use \App\Models\Profile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Profile::create(
            [
                'name' => 'Super Admin',
                'dob' => now(),
                'gender' => 'Male',
                'email' => 'super@demo.com',
                'phone_number' => '07035660599'
            ]);
        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,

            GroupSeeder::class,
            GroupMemberSeeder::class,


        ]);
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
