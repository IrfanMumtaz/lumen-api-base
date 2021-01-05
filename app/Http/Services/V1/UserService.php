<?php


namespace App\Http\Services\V1;

use App\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function store($request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->email;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->status = User::STATUS['pending'];
        $user->save();

        //assign user roles
        if (!empty($request->get('roles')) && count($request->get('roles')) > 0) {
            foreach ($request->get('roles') as $role) {
                $user->assignRole($role);
            }
        }

        return $user;
    }

    public static function getByUserName($username)
    {
        $username = clean($username);

        $user = User::where('username', $username)->first();
        return $user;
    }
}
