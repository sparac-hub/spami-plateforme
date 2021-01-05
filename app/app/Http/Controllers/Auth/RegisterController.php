<?php

namespace App\Http\Controllers\Auth;

use App\Models\Cms\User;
use App\Services\Auth\RedirectionService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    protected $redirectionService;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->redirectTo = locale_prefix() . '/admin';
        $this->redirectionService = new RedirectionService();

        if ($redirection_route_name = $this->redirectionService->getRedirectionUrlBasedOnRole(auth()->user())) {
            $this->redirectTo = $redirection_route_name;
        }

        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view(config('cms.auth.views_folder') . 'auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'custom_app_role_id' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['custom_app_role_id']);

        // Update property $redirectTo
        if (isset($user->roles->first()->name) && isset(config('cms.role_dashboard')[$user->roles->first()->name])) {
            $url = config('cms.role_dashboard')[$user->roles->first()->name];
            $this->redirectTo = route($url);
        }

        return $user;
    }
}
