<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Models\Cms\Role;
use App\Models\Cms\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        $users = User::with('roles')->get();

        $admins = User::role('Admin')->get();

        return view('back.users.index', compact('users', 'admins'));
    }

    /**
     * @param \App\Http\Requests\UserRequest $request
     * @return  Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $user->assignRole(Role::find($request->role_id));

        return redirect()->route('back.users.index')
            ->with('success', trans('og.alert.success'));
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);

        return view('back.users.edit', compact('user'));
    }

    /**
     * @param \App\Http\Requests\UserRequest $request
     * @param int $id
     * @return  Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->all();

        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        $user->syncRoles([Role::find($request->role_id)]);

        return redirect()->route('back.users.index')
            ->with('success', trans('og.alert.success'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (!$user->hasRole('Admin')) {
            $user->delete();
            return redirect()->back()->with('success', trans('og.alert.success'));
        }

        return redirect()->back()->with('error', trans('og.alert.invalid_role'));
    }
}
