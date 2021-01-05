<?php

use App\Models\Cms\Locale;
use Illuminate\Database\Seeder;

class LocalesTableSeeder extends Seeder
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
                'reference' => 'fr',
                'name' => 'Français',
                'is_default' => 1,
                'is_active' => 1,
                'is_rtl' => 0,
            ],
            [
                'reference' => 'en',
                'name' => 'English',
                'is_default' => 0,
                'is_active' => 1,
                'is_rtl' => 0,
            ],
            [
                'reference' => 'ar',
                'name' => 'العربية',
                'is_default' => 0,
                'is_active' => 1,
                'is_rtl' => 1,
            ],
        ];

        foreach ($data as $d) {
            $localeExist = Locale::whereReference($d['reference'])->count();

            if (!$localeExist) {
                Locale::create($d);
            }
        }
    }

}
