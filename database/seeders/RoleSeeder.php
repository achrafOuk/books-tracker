<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // define roles
        $roles = ['user','admin'];
        #define users permissions
        $user_permissions = [
            'add comment',
            'edit comment',
            'add book status',
            'update book status',
            'add note',
            'update note',
            'delete note',
        ];

        #define admin permissions
        $admin_permissions = [
            'add book',
            'update book',
            'delete book',
            'create category',
            'update category',
            'delete category',
        ];

        for($i=0;$i<count($roles);$i++)
        {
            $role = Role::create([ 'name' => $roles[$i] ]);
            if($i == 0)
            {
                foreach($user_permissions as $permissions)
                {
                    $permission = Permission::create([ 'name' => $permissions ]);
                    $role->givePermissionTo($permission);
                    $permission->assignRole($role);
                }
            }
        }
    }
}
