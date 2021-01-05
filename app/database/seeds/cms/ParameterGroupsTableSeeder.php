<?php

use Illuminate\Database\Seeder;
use App\Models\Cms\ParameterGroup;

class ParameterGroupsTableSeeder extends Seeder
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
                'reference' => null,
                'name' => 'General',
            ],
            [
                'reference' => null,
                'name' => 'Logo',
            ],
            [
                'reference' => null,
                'name' => 'Colors',
            ],
            [
                'reference' => null,
                'name' => 'Location',
            ],
            [
                'reference' => null,
                'name' => 'Social',
            ],
            [
                'reference' => null,
                'name' => 'Misc',
            ],
            [
                'reference' => null,
                'name' => 'SMTP',
            ],
            [
                'reference' => null,
                'name' => 'Google APIs',
            ],
            [
                'reference' => null,
                'name' => 'Others',
            ],
        ];

        foreach ($data as $d) {
            $d['reference'] = \Str::slug($d['name'], '_');
            ParameterGroup::firstOrCreate($d);
        }
    }
}
