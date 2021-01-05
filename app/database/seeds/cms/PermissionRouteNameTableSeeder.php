<?php

use App\Models\Cms\Module;
use App\Models\Cms\Permission;
use Illuminate\Database\Seeder;
use App\Models\Cms\PermissionRouteName;

class PermissionRouteNameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission_route_names = \App\Models\Cms\PermissionRouteName::get();
        foreach ($permission_route_names as $permission_route_name) {
            $permission_route_name->delete();
        }

        $permissions = \App\Models\Cms\Permission::get();
        foreach ($permissions as $permission) {
            $permission->delete();
        }

        $routes = collect(\Illuminate\Support\Facades\Route::getRoutes());

        foreach ($routes as $route) {
            $route_name = $route->getName();

            if (substr($route_name, 0, 5) == "back." || substr($route_name, 0, 9) == "unisharp." || substr($route_name, 0, 14) == "pretty-routes.") {
                $permission = \App\Models\Cms\Permission::firstOrCreate([
                    'name' => $route_name,
                ]);

                if (isset($permission->id)) {
                    \App\Models\Cms\PermissionRouteName::firstOrCreate([
                        'permission_id' => $permission->id,
                        'route_name' => $route_name,
                    ]);
                }
            }
        }

        $admin = \App\Models\Cms\Role::where('name', 'Admin')->first();

        if ($admin) {
            $admin->has_access_bo = true;
            $admin->update();

            foreach (\App\Models\Cms\Permission::get() as $permission_for_admin) {
                DB::table('role_has_permissions')->insert([
                    'permission_id' => $permission_for_admin->id,
                    'role_id' => $admin->id,
                ]);
            }
        }

    }
}
