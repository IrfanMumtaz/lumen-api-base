<?php


namespace App\Http\Businesses;


use App\Exceptions\BaseException;
use App\Exceptions\Error;

use App\Http\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthenticationBusiness
{
    public static function verifyLoginInfo($request)
    {

        $user = (new UserService())->getByUserName($request->username);
        $userRoles = $user->getRoleNames()->toArray();
        if (count(array_intersect(User::LOGINABLE_ROLES, $userRoles)) < 1) throw new BaseException(Error::$NOT_LOGABLE);
        if (!Hash::check($request->password, $user->password)) throw new BaseException(Error::$INVALID_USER_CREDENTIALS);

        $auth['token'] = self::createToken($user);
        return self::generateVerificationResponse($auth, $user);
    }

    private static function createToken($user)
    {
        $tokenResult = $user->createToken('Password Grant Client');
        $token = $tokenResult->token;
        $token->expires_at = (new \DateTime('now'))->modify("+1 year");
        $token->save();

        return $tokenResult;
    }

    private static function generateVerificationResponse($auth, $user)
    {
        return [
            'access_token' => $auth['token']->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => ($auth['token']->token->expires_at)->format('Y-m-d H:i:s'),
            'user' => $user,
            'permissions' => self::userPermissionArray($user)
        ];
    }

    private static function userPermissionArray($user)
    {
        $permissions = $user->getAllPermissions()->toArray();
        $permissions = array_column($permissions, 'name');

        return $permissions;
    }
}
