<?php

use Illuminate\Database\Seeder;

class MapLayersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        if (isset(config('cms.layersOws')['items']) && count(config('cms.layersOws')['items'])) {
            // map_layers
            $array = [];
            $cpt = 1;
            \DB::table('map_layers')->delete();
            foreach (config('cms.layersOws')['items'] as $layersOws => $name) {
                array_push($array, [
                    'id' => $cpt,
                    'order' => $cpt,
                    'is_active' => 1,
                    'layer' => $layersOws,
                    'deleted_at' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => null,
                ]);
                $cpt++;
            }
            \DB::table('map_layers')->insert($array);
            // >>

            // map_layer_translations
            $array = [];
            $cpt = 1;
            \DB::table('map_layer_translations')->truncate();
            foreach (config('cms.layersOws')['items'] as $layersOws => $name) {
                array_push($array, [
                    'id' => $cpt,
                    'map_layer_id' => $cpt,
                    'locale' => "fr",
                    'name' => $name,
                    'description' => "",
                    'deleted_at' => null,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => null,
                ]);
                $cpt++;
            }
            \DB::table('map_layer_translations')->insert($array);
            // >>
        }
    }
}
