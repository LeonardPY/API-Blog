<?php

namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function login($data)
    {
        //attempt login
        if(!Auth::attempt($data)) {
            return response([
                'message' => 'Invalid credentials'
            ],403);
        }

        //return user login token in response
        return response([
            'user'  => auth()->user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ],200);
    }
}
