<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['title' => 'view_workers'],
            ['title' => 'edit_workers'],
            ['title' => 'view_roles'],
            ['title' => 'edit_roles'],
            ['title' => 'view_products'],
            ['title' => 'edit_products'],
            ['title' => 'view_orders'],
            ['title' => 'edit_orders'],
        ]);
    }
}
