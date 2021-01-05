<?php

namespace App\Http\Controllers\Back;

use App\Http\Requests;
use App\Models\Cms\Role;
use Illuminate\Http\Request;
use App\Models\Cms\Permission;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    /**
     * @return  Response
     */
    public function index()
    {
        $roles = Role::with('users')->where('name', '<>', 'Admin')->get();

        return view('back.roles.index', compact('roles'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return  Response
     */
    public function store(Request $request)
    {
        $role = Role::create($request->all());

        return redirect()->route('back.roles.edit', $role->id)
            ->with('success', trans('og.alert.success'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $role->update($request->all());

        return redirect()->route('back.roles.index')
            ->with('success', trans('og.alert.success'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        $permissions = Permission::get();

        $data = [];
        foreach ($permissions as $permission) {
            $match = explode('.', $permission->name);
            if (!isset($data[$match[1]])) {
                $data[$match[1]] = $match[1];
            }
        }

        return view('back.roles.edit', compact('role', 'permissions', 'data'));
    }

    /**
     * Grant/Revoke Permissions to roles. [ role_id, permission_id, state ]
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePermissionStatus(Request $request)
    {
        if ($request->role_id && $request->permission_id && $request->state) {

            $role = Role::findOrFail($request->role_id);
            $permission = Permission::find($request->permission_id);

            if ($request->state == 'true') {
                if (!$role->hasPermissionTo($permission)) {
                    $role->givePermissionTo($permission);
                    if ($request->permission_with) {
                        $permission_with = Permission::find($request->permission_with);
                        $role->givePermissionTo($permission_with);
                    }
                }
                $message = 'Permission granted';
            } else {
                if ($role->hasPermissionTo($permission)) {
                    $role->revokePermissionTo($permission);
                    if ($request->permission_with) {
                        $permission_with = Permission::find($request->permission_with);
                        $role->revokePermissionTo($permission_with);
                    }
                }
                $message = 'Permission revoked';
            }

            return response()->json(['result' => 'success', 'message' => $message]);
        }

        return response()->json(['result' => 'error']);
    }

    /**
     * @param int $id
     * @return  Response
     */
    public function destroy($id, Request $request)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect()->route('back.roles.index')
            ->with('success', trans('og.alert.success'));
    }
}
