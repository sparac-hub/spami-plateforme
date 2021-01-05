<?php

use App\Models\Cms\Role;
use App\Models\Cms\Permission;
use Illuminate\Database\Seeder;

class CustomAppRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // 'User',
        ];

        foreach ($data as $d) {
            Role::firstOrCreate(['name' => $d, 'is_custom_app_role' => 1]);
        }

    }
}
