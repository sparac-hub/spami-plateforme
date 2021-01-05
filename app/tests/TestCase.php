<?php

namespace Tests;

use App\Models\Cms\Menu;
use App\Models\Cms\Role;
use App\Models\Cms\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createAdmin(): User
    {
        $user = factory(User::class)->create();

        $role = Role::create(['name' => 'Admin']);

        $user->roles()->sync($role);

        return $user;
    }

    public function menuFactory(int $menuGroupId, int $moduleId, string $label): Menu
    {
        $menu = [
            //'id' => '',
            'menu_group_id' => $menuGroupId,
            'module_id' => $moduleId,
            //'route_name' => '',
            //'route_parameters' => '',
            //'parent_id' => '',
            //'link_type_id' => '',
            'http_protocol' => null,
            'external_link' => null,
            'internal_link' => null,
            'link_target' => null,
            'is_active' => 1,
            'icon' => '',
            'order' => 10,
            'css_class' => '',
            'image1' => '',
            'tmb1' => '',
        ];

        foreach (config('translatable.locales') as $locale) {
            $menu[$locale] = [
                //'id' => '',
                //'menu_id' => '',
                'locale' => $locale,
                'label' => $locale . ' ' . $label,
                'slug' => Str::slug($locale . ' ' . $label),
                'meta_title' => $locale . ' ' . $label,
                'meta_description' => $locale . ' ' . $label,
                'content' => $locale . ' ' . $label,
            ];
        }

        return Menu::create($menu);
    }

    protected function setUp(): void
    {
        parent::setUp();
    }
}
