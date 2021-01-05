<?php

use App\Models\Cms\Parameter;
use Illuminate\Database\Seeder;
use App\Models\Cms\ParameterGroup;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameter_groups = ParameterGroup::get()->keyBy('reference');

        // TODO: Important! explicitly define references
        // TODO : Some parameters got to be translated. Example : Description
        $data = [
            [
                'name' => 'Website name',
                'reference' => null,
                'value' => 'CMS Laravel',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['general']['id'],
            ],
            [
                'name' => 'Description',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['general']['id'],
            ],
            [
                'name' => 'Main logo',
                'reference' => null,
                'value' => 'https://via.placeholder.com/150x40.png?text=Laravel',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['logo']['id'],
            ],
            [
                'name' => 'Mobile logo',
                'reference' => null,
                'value' => 'https://via.placeholder.com/150x40.png?text=Laravel',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['logo']['id'],
            ],
            [
                'name' => 'Footer logo',
                'reference' => null,
                'value' => 'https://via.placeholder.com/150x40.png?text=Laravel',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['logo']['id'],
            ],
            [
                'name' => 'Other Logo',
                'reference' => null,
                'value' => 'https://via.placeholder.com/150x40.png?text=Laravel',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['logo']['id'],
            ],
            [
                'name' => 'Backend Theme',
                'reference' => null,
                'value' => 'darkblue',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['colors']['id'],
            ],
            [
                'name' => 'Color',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['colors']['id'],
            ],
            [
                'name' => 'Color code',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['colors']['id'],
            ],
            [
                'name' => 'Label color code',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['colors']['id'],
            ],
            [
                'name' => 'Background color code',
                'reference' => null,
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['colors']['id'],
            ],
            [
                'name' => 'Lang',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                // 'parameter_group_id' => 1,
            ],
            [
                'name' => 'Country',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                // 'parameter_group_id' => 1,
            ],
            [
                'name' => 'Region',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                // 'parameter_group_id' => 1,
            ],
            [
                'name' => 'Contact lat',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                // 'parameter_group_id' => 1,
            ],
            [
                'name' => 'Contact lng',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                // 'parameter_group_id' => 1,
            ],
            //
            [
                'module_id' => 3,
                'name' => 'Phone',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'name' => 'Email',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'name' => 'Website',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'name' => 'Address',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['location']['id'],
                'name' => 'Map lat',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['location']['id'],
                'name' => 'Map lng',
                'reference' => null,
                'value' => null,
            ],
            [
                'name' => 'Map Image',
                'reference' => null,
                'value' => '',
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['location']['id'],
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Facebook',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Vimeo',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'RSS',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Instagram',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Twitter',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Youtube',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Google plus',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => 3,
                'parameter_group_id' => $parameter_groups['social']['id'],
                'name' => 'Linkedin',
                'reference' => null,
                'value' => null,
            ],

            // SMTP: [Get free account for tests on: https://mailtrap.io/]
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail driver',
                'reference' => null,
                'value' => env('MAIL_DRIVER'),
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail host',
                'reference' => null,
                'value' => env('MAIL_HOST'),
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail port',
                'reference' => null,
                'value' => env('MAIL_PORT'),
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail username',
                'reference' => null,
                'value' => env('MAIL_USERNAME'),
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail From Address',
                'reference' => null,
                'value' => 'contact@medianet.test',
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail From Name',
                'reference' => null,
                'value' => 'Contact CMS Laravel',
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail password',
                'reference' => null,
                'value' => env('MAIL_PASSWORD'),
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['smtp']['id'],
                'name' => 'Mail encryption',
                'reference' => null,
                'value' => env('MAIL_ENCRYPTION'),
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['google_apis']['id'],
                'name' => 'Analytics',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['google_apis']['id'],
                'name' => 'Analytics for backoffice',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['google_apis']['id'],
                'name' => 'Tag Manager',
                'reference' => null,
                'value' => null,
            ],
            [
                'module_id' => null,
                'parameter_group_id' => $parameter_groups['google_apis']['id'],
                'name' => 'Maps key',
                'reference' => null,
                'value' => null,
            ],
        ];

        foreach ($data as $d) {
            $d['reference'] = \Str::slug($d['name'], '_');
            Parameter::firstOrCreate($d);
        }
    }
}
