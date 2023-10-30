<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = [
            'user', 'post', 'categorypost', 'postcomment',
            'demo', 'configure', 'langcustom', 'redirect', 'seo', 'menu', 'banner', 'terminal'
        ];

        $actions = ['edit', 'add', 'list', 'delete'];

        foreach ($entities as $entity) {
            foreach ($actions as $action) {
                Permission::create(['name' => "$action $entity", 'group_name' => "$entity"]);
            }
        }
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::first();
        $user->syncRoles('super-admin');
    }
}
