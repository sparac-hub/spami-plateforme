<?php

namespace Tests\Feature\Back;

use Tests\TestCase;
use DatabaseSeeder;
use LocalesTableSeeder;
use ModulesTableSeeder;
use App\Models\Cms\User;
use App\Models\Cms\Module;
use MenuGroupsTableSeeder;
use App\Models\Cms\MenuGroup;
use App\Models\Cms\FaqCategory;
use App\Models\Cms\FaqCategoryTranslation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FaqCategoriesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function unauthenticated_user_is_redirected_to_login()
    {
        $this->get(route('back.faq_categories.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function user_can_view_a_login_form()
    {
        $this->get(route('back.faq_categories.index'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    public function user_without_admin_role_cannot_access_index()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $this->get(route('back.faq_categories.index'))
            ->assertStatus(403);
    }

    /** @test */
    public function user_with_admin_role_cannot_access_index_without_a_given_menu_id()
    {
        $user = $this->createAdmin();

        $this->actingAs($user);

        $this->get(route('back.faq_categories.index'))
            ->assertStatus(404);
    }

    /** @test */
    public function user_with_admin_role_can_access_index_with_a_valid_menu_id()
    {
        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $faq_category = factory('App\Models\Cms\FaqCategory')->create([
            'menu_id' => $menu->id,
        ]);

        $this->get(route('back.faq_categories.index', ['menu_id' => $menu->id]))
            ->assertStatus(200);

        $this->get(route('back.faq_categories.show', $faq_category->id))
            ->assertStatus(200)
            ->assertSeeText($faq_category->name);
    }

    public function runSeeders()
    {
        app(DatabaseSeeder::class)->call(LocalesTableSeeder::class);
        app(DatabaseSeeder::class)->call(MenuGroupsTableSeeder::class);
        app(DatabaseSeeder::class)->call(ModulesTableSeeder::class);
    }

    /** @test */
    public function user_with_admin_role_can_see_create_form()
    {
        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $this->get(route('back.faq_categories.create', ['menu_id' => $menu->id]))
            ->assertStatus(200);
    }

    /** @test */
    public function user_with_admin_role_can_store_faq_category()
    {
        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $faq_category_array = factory('App\Models\Cms\FaqCategory')->make([
            'menu_id' => $menu->id,
        ])->toArray();

        foreach ($faq_category_array['translations'] as $translation) {
            $faq_category_array[$translation['locale']] = $translation;
        }

        $this->followingRedirects()->post(route('back.faq_categories.store', $faq_category_array))
            ->assertStatus(200)
            ->assertSee(trans('og.alert.success'));

    }

    /** @test */
    public function user_with_admin_role_can_see_edit_form()
    {
        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $faq_category = factory('App\Models\Cms\FaqCategory')->create([
            'menu_id' => $menu->id,
        ]);

        $this->get(route('back.faq_categories.edit', $faq_category->id))
            ->assertStatus(200);
    }

    /** @test */

    public function user_with_admin_role_can_update_faq_category()
    {
        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $faq_category = factory('App\Models\Cms\FaqCategory')->create([
            'menu_id' => $menu->id,
            'is_active' => false,
        ]);

        $faq_category_array = $faq_category->toArray();

        $faq_category_array['is_active'] = true;

        foreach ($faq_category['translations'] as $translation) {
            $faq_category_array[$translation['locale']] = $translation->toArray();
        }

        $this->followingRedirects()
            ->put(route('back.faq_categories.update', $faq_category->id), $faq_category_array);

        $this->assertDatabaseHas((new FaqCategory())->getTable(), ['id' => $faq_category->id, 'is_active' => true]);
    }

    /** @test */
    public function user_with_admin_role_can_delete_faq_category()
    {
        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $faq_category = factory('App\Models\Cms\FaqCategory')->create([
            'menu_id' => $menu->id,
        ]);

        $this->delete(route('back.faq_categories.destroy', $faq_category->id));

        $this->get(route('back.faq_categories.destroy', $faq_category->id))
            ->assertStatus(404);

        $this->assertSoftDeleted((new FaqCategory())->getTable(), ['id' => $faq_category->id]);

        // Check that all translations has been soft deleted in cascade
        foreach ($faq_category->translations as $faqCategoryTranslation) {
            $this->assertSoftDeleted((new FaqCategoryTranslation())->getTable(), ['id' => $faqCategoryTranslation->id]);
        }
    }

    /** @test */
    public function form_data_are_validated_before_storing_them()
    {
        // $this->withoutExceptionHandling();

        $this->runSeeders();

        $adminUser = $this->createAdmin();

        $this->actingAs($adminUser);

        $menuGroupId = MenuGroup::whereReference('main-menu')->first()->id;

        $moduleId = Module::whereReference('faqs')->first()->id;

        $menu = $this->menuFactory($menuGroupId, $moduleId, 'Faq');

        $faq_category_array = factory('App\Models\Cms\FaqCategory')->make([
            'menu_id' => $menu->id,
        ])->toArray();

        unset($faq_category_array['is_active']);

        $missing_inputs = ['is_active'];
        $not_required_inputs = [];

        foreach ($faq_category_array['translations'] as $key => $translation) {
            $missing_inputs[] = $translation['locale'] . '.' . 'slug';
            $missing_inputs[] = $translation['locale'] . '.' . 'name';
            $not_required_inputs[] = $translation['locale'] . '.' . 'description';
        }

        $emptyFormData = [];

        $this->json('POST', route('back.faq_categories.store', $emptyFormData))
            ->assertStatus(422);

        $this->post(route('back.faq_categories.store', $emptyFormData))
            ->assertSessionHasErrors($missing_inputs)
            ->assertSessionDoesntHaveErrors($not_required_inputs);
    }
}
