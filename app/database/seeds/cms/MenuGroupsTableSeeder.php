<?php

use Illuminate\Support\Str;
use App\Models\Cms\MenuGroup;
use Illuminate\Database\Seeder;

class MenuGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('cms.menu_groups') as $menu_group_id => $menu_group_name) {
            MenuGroup::firstOrCreate([
                'name' => $menu_group_name,
                'reference' => Str::slug($menu_group_name, '-'),
            ]);
        }
    }
}
