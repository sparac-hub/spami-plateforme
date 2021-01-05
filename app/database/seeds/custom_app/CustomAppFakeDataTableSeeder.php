<?php

use App\Models\Cms\User;
use App\Models\Cms\Role;
use Illuminate\Database\Seeder;

class CustomAppFakeDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo " \n ******* Starting CustomApp fake data seeder ******* \n";
        $this->users();
    }

    public function users()
    {
        echo " \n * Initializing fake CustomApp users: ";

        $roleName = 'User';
        $email = strtolower($roleName) . '@medianet.test';

        $roleExist = Role::whereName($roleName)->count();

        if (!$roleExist) {
            return;
        }

        if (!User::where('email', $email)->get()->count()) {
            $user = User::create([
                'name' => $roleName,
                'email' => $email,
                'password' => bcrypt('secret'),
            ]);

            if (!$user->hasRole($roleName)) {
                $user->assignRole($roleName);
            }

            echo " \n     - User : user@medianet.test - Password : secret";
        }
    }
}
