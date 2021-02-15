<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roleAdmin = Role::create(['name' => 'Superadmin']);
        $roleBlogger = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$roleAdmin,$roleBlogger]);

        Permission::create(['name' => 'admin.users.index'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.users.update'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'admin.categories.index'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.categories.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.categories.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.categories.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'admin.tags.index'])->syncRoles([$roleAdmin, $roleBlogger]);
        Permission::create(['name' => 'admin.tags.create'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.tags.edit'])->syncRoles([$roleAdmin]);
        Permission::create(['name' => 'admin.tags.destroy'])->syncRoles([$roleAdmin]);

        Permission::create(['name' => 'admin.posts.index'])->syncRoles([$roleAdmin,$roleBlogger]);
        Permission::create(['name' => 'admin.posts.create'])->syncRoles([$roleAdmin,$roleBlogger]);
        Permission::create(['name' => 'admin.posts.edit'])->syncRoles([$roleAdmin,$roleBlogger]);
        Permission::create(['name' => 'admin.posts.destroy'])->syncRoles([$roleAdmin,$roleBlogger]);
    }
}
