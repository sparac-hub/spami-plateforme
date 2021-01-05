<?php

use App\Models\Cms\LinkType;
use Illuminate\Database\Seeder;

class LinkTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Maybe 
        $data = [
            [
                //'id'        => 1,
                'reference' => null,
                'name' => 'Module',
            ],
            [
                //'id'        => 2,
                'reference' => null,
                'name' => 'Internal Link',
            ],
            [
                //'id'        => 3,
                'reference' => null,
                'name' => 'External Link',
            ],
        ];

        foreach ($data as $d) {
            $d['reference'] = \Str::slug($d['name'], '_');
            LinkType::firstOrCreate($d);
        }
    }
}
