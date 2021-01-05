<?php

namespace App\Http\Controllers\Back;

use Hash;
use App\Http\Requests;
use App\Models\Cms\User;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    /**
     * @return  Response
     */
    public function myProfile()
    {
        $user = auth()->user();

        return view('back.user_profile.my_profile', compact('user'));
    }

    /**
     * @param Requests\UpdateUserProfile $request
     * @return  Response
     */
    public function update(Requests\UpdateUserProfile $request)
    {
        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('back.my-profile')
                ->with('error', trans('og.alert.invalid_password'));
        }

        if ($request->password) {
            $request->merge(['password' => bcrypt($request->password)]);
        } else {
            $request->request->remove('password');
        }

        if ($user->email != $request->email) {
            if (User::where('email', $request->email)->count()) {
                return redirect()->route('back.my-profile')
                    ->with('error', trans('og.alert.email_exist'));
            }
        }

        $user->update($request->all());

        return redirect()->route('back.my-profile')
            ->with('success', trans('og.alert.success'));
    }
}
