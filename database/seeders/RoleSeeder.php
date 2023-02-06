<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::factory()->create([
            'title' => 'Admin'
        ]);

        $editor = Role::factory()->create([
            'title' => 'Editor'
        ]);

        $viewer = Role::factory()->create([
            'title' => 'Viewer'
        ]);

        $permissions = Permission::all();

        $admin->permissions()->attach($permissions->pluck('id'));

        $editor->permissions()->attach($permissions->pluck('id'));

        $editor->permissions()->detach(4);

        $viewer->permissions()->attach([1, 5, 7]);

    }
}
