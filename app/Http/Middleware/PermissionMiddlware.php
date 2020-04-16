<?php

namespace App\Http\Middleware;

use App\Exceptions\BaseException;
use App\Exceptions\Error;
use Closure;

class PermissionMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if (app('auth')->guest()) {
            throw new BaseException(Error::$UNAUTHRIZED);
        }

        $permissions = is_array($permission)
            ? $permission
            : explode('|', $permission);

        $userPermission = app('auth')->user()->getAllPermissions()->toArray();
        $userPermission = array_column($userPermission, 'name');
        foreach ($permissions as $permission) {
            if (in_array($permission, $userPermission, true)) {
                return $next($request);
            }
        }

        throw new BaseException(Error::$UNAUTHRIZED);
    }
}
