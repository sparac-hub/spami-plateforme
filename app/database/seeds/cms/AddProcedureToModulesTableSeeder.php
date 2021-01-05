<?php

use App\Models\Cms\Module;
use Illuminate\Database\Seeder;

class AddProcedureToModulesTableSeeder extends Seeder
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
                'name' => 'Procedures',
                'reference' => 'procedures',
                'main_model' => 'App\Models\Cms\Procedure',
                'is_active' => 1,
                'is_menu_module' => true,
                'order' => 50,
                'icon' => '',
                'backend_route' => 'back.procedures.index',
                'backend_controller' => 'Procedures',
                'backend_action' => 'index',
                'except_backend_actions' => null,
                'only_backend_actions' => null,
                'frontend_route' => 'back.procedures.index',
                'front_namespace' => 'Front',
                'front_controller' => 'ProceduresController',
                'frontend_action' => 'index',
                'is_on_backend_sidebar' => 0,
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
