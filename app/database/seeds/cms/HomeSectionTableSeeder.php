<?php

use App\Models\Cms\Module;
use Illuminate\Database\Seeder;
use App\Models\Cms\HomeSection;

class HomeSectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Top Banner',
                'reference' => 'top_banner',
                'value' => '',
                'module_id' => null,
                'menu_id' => 1,
            ],

        ];

        foreach ($data as $d) {
            HomeSection::firstOrCreate($d);
        }
    }
}
