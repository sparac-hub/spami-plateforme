<?php

use App\Models\Cms\Module;
use Illuminate\Database\Seeder;

class ModuleSchemasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *
         * IMPORTANT ! ****************!
         * Do not change the modules ids
         * Todo : Maybe later we can find module by reference and remove the ids
         *
         */
        // TODO : Make module names tranlsatable !
        $data = [
            [
                'name' => 'Schema Aspim',
                'reference' => 'schema-aspim',
                'is_active' => 1,
                'is_menu_module' => false,
                'order' => 50,
                'icon' => 'fa fa-globe',
                'backend_route' => '#',
                'backend_controller' => null,
                'backend_action' => null,
                'except_backend_actions' => null,
                'only_backend_actions' => null,
                'frontend_route' => null,
                'front_namespace' => 'Front',
                'front_controller' => null,
                'frontend_action' => null,
                'is_on_backend_sidebar' => 1,
                'parent_reference' => null,
            ],
            [
                'name' => 'Schemas',
                'reference' => 'schemas',
                'is_menu_module' => false,
                'is_active' => 1,
                'order' => 150,
                'icon' => '',
                'backend_route' => 'back.schemas.index',
                'backend_controller' => 'Schemas',
                'backend_action' => 'index',
                'except_backend_actions' => null,
                'only_backend_actions' => null,
                'frontend_route' => null,
                'front_namespace' => 'Front',
                'front_controller' => 'SchemasController',
                'frontend_action' => 'index',
                'is_on_backend_sidebar' => true,
                'parent_reference' => 'schema-aspim',
            ],
        ];

        Cache::forget('active_locales'); // Update active locales [bugfix: during the installation of demo]
        config(['translatable.locales' => get_translatable_locales()]);
        $locales = get_translatable_locales();

        foreach ($data as $d) {

            $parent_id = self::getParentIdForModule($d);

            if (Module::where('reference', $d['reference'])->get()->isEmpty()) {
                $module = [
                    'reference' => $d['reference'],
                    'main_model' => $d['main_model'] ?? null,
                    'widget_orderable_columns' => $d['widget_orderable_columns'] ?? null,
                    'is_active' => $d['is_active'],
                    'is_menu_module' => $d['is_menu_module'],
                    'order' => $d['order'],
                    'icon' => $d['icon'],
                    'backend_route' => $d['backend_route'],
                    'frontend_route' => $d['frontend_route'],
                    'front_namespace' => $d['front_namespace'],
                    'front_controller' => $d['front_controller'],
                    'is_on_backend_sidebar' => $d['is_on_backend_sidebar'],
                    'parent_id' => $parent_id,
                ];
                foreach ($locales as $locale) {
                    $module[$locale]['name'] = $d['name'];
                }
                Module::create($module);
            }
        }
    }

    public static function getParentIdForModule(array $d)
    {
        if (isset($d['parent_reference']) && $d['parent_reference']) {
            return Module::where('reference', $d['parent_reference'])->first()->id ?? null;
        }

        return null;
    }
}

