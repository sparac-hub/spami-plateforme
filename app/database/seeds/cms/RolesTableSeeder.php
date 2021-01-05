<?php

use App\Models\Cms\Role;
use App\Models\Cms\Permission;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'Admin',
            'User',
        ];

        foreach ($data as $d) {
            Role::firstOrCreate(['name' => $d]);
        }

        // Give all permissions to the Admin
        if ($role = Role::where('name', 'Admin')->first()) {
            $permissions = Permission::get();
            $role->syncPermissions($permissions);
            /*foreach ($permissions as $permission) {
                if(!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                }
            }*/
        }

    }
}
