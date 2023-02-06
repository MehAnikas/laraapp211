<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'first_name' => 'manager',
            'last_name' => 'manager',
            'email' => 'manager@manager.com',
            'role_id' => 2,
        ]);

        User::factory()->create([
            'first_name' => 'viewer',
            'last_name' => 'viewer',
            'email' => 'viewer@viewer.com',
            'role_id' => 3,
        ]);
    }
}
