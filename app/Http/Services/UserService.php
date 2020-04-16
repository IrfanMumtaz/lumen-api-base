<?php


namespace App\Http\Services;

use App\Exceptions\BaseException;
use App\Exceptions\Error;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function store($request, $id = null){
        $user = User::firstOrNew(['id' => $id]);
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->username = $request->contact['email'];
        $user->password = Hash::make($request->contact['email']);
        $user->cnic = $request->cnic;
        $user->gender = strtoupper($request->gender);
        $user->dob = $request->dob;
        $user->religion = $request->religion;
        $user->nationality = $request->nationality;
        $user->status = User::STATUS['pending'];
        $user->save();

        //assign user role
        if(!empty($request->get('role_id')) && count($request->get('role_id')) > 0){
            foreach ($request->get('role_id') as $role){
                DB::table('model_has_roles')->insert([
                    'model_type' => 'App\User',
                    'role_id' => $role,
                    'model_id' => $user->id
                ]);
            }
        }

        return $user;
    }

    public function getByUserName($username){
        $username = clean($username);

        $user = User::where('username', $username)->first();
        if (!$user) throw new BaseException(Error::$UNAUTHRIZED);

        return $user;
    }

}
