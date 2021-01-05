<?php

namespace App\Services\Auth;

use App\Models\Cms\User;

class RedirectionService
{
    public function getRedirectionUrlBasedOnRole(User $user = null)
    {
        if (!$user) {
            return false;
        }

        $role_redirection = config('cms.role_dashboard');

        if (isset($role_redirection[$this->getFirstRoleNameForUser($user)])) {
            if ($redirection_route_name = $role_redirection[$this->getFirstRoleNameForUser($user)]) {
                return route('' . $redirection_route_name);
            }
        }

        return false;
    }

    public function getFirstRoleNameForUser(User $user)
    {
        if (isset($user->roles->first()->name)) {
            return $user->roles->first()->name;
        }
        return false;
    }
}