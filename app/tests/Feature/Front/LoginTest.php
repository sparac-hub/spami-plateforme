<?php

namespace Tests\Feature\Front;

use Tests\TestCase;
use App\Models\Cms\Role;
use App\Models\Cms\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_a_login_form()
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    /** @test */
    public function user_cannot_view_a_login_form_when_authenticated()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get('/login')
            ->assertRedirect('/admin');
    }

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $this->withoutExceptionHandling();

        $password = 'secret';

        $user = factory(User::class)->create([
            'password' => bcrypt($password),
            'email_verified_at' => date('Y-m-d H:i:s'),
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_without_admin_role_cannot_access_admin_dashboard()
    {
        $password = 'secret';

        $user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);

        // User without admin role
        $this->followingRedirects()
            ->post('/login', [
                'email' => $user->email,
                'password' => $password,
            ])
            ->assertStatus(403);
    }

    /** @test */
    public function user_with_admin_role_can_access_admin_dashboard()
    {
        $password = 'secret';

        $user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        // Assign role "Admin" to user
        $user->roles()->sync($role);

        $this->followingRedirects()
            ->post('/login', [
                'email' => $user->email,
                'password' => $password,
            ])
            ->assertStatus(200);
    }

    /** @test */
    public function user_is_redirected_by_default_to_admin_after_successful_login()
    {
        $password = 'secret';

        $user = factory(User::class)->create([
            'password' => bcrypt('secret'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        // Assign role "Admin" to user
        $user->roles()->sync($role);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ])
            ->assertRedirect('/admin');

        auth()->logout();
    }

    /** @test */
    public function user_cannot_login_with_incorrect_password()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt('ValidPassword'),
        ]);

        $this->from('/login')
            ->post('/login', [
                'email' => $user->email,
                'password' => 'invalid-password',
            ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function remember_me_functionality()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'secret'),
        ]);

        $role = Role::create(['name' => 'Admin']);

        $user->roles()->sync($role);

        $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ])
            ->assertRedirect('/admin')
            ->assertCookie(\Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
                $user->id,
                $user->getRememberToken(),
                $user->password,
            ]));

        $this->assertAuthenticatedAs($user);
    }
}
