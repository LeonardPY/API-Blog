<?php

namespace App\Services\Auth;

use App\Models\User;

class Services
{
    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = User::create([
            "name"     => $data['name'],
            "email"    => $data['email'],
            "password" => $data['password']
        ]);

        //return user token in response
        return response([
            'user'  => $user,
            'token' => $user->createToken('secret')->plainTextToken
        ]);
    }
}
