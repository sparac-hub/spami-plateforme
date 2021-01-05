<?php

use App\Models\Cms\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo " \n * Initializing default users: ";

        if (!User::where('email', 'admin@medianet.test')->get()->count()) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@medianet.test',
                'password' => bcrypt('secret'),
            ]);

            if (!$user->hasRole('Admin')) {
                $user->assignRole('Admin');
            }

            echo " \n     - Admin : admin@medianet.test - Password : secret";
        }

        if (!User::where('email', 'user@medianet.test')->get()->count()) {
            $user = User::create([
                'name' => 'User',
                'email' => 'user@medianet.test',
                'password' => bcrypt('secret'),
            ]);

            if (!$user->hasRole('User')) {
                $user->assignRole('User');
            }

            echo " \n     - User : user@medianet.test - Password : secret";
        }

        echo "\n \n";
    }
}
