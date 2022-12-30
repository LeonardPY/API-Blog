<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Services extends BaseService
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

    public function logout()
    {
        // return user logout
        auth()->user()->tokens()->delete();
        return response([
            'massage' => 'Logout success.'
        ],200);
    }

    public function user()
    {
        return response([
            'user' => \auth()->user()
        ],200);
    }

    public function update($data)
    {
        $user = \auth()->user();

        if(isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }else {
            $data['password'] = $user->password;
        }
        if(!isset($data['name'])) {
            $data['name'] = $user->name;
        }

        $user->update([
            "name" => $data['name'],
            "password" => $data['password']
        ]);

        return response([
            'user' => \auth()->user()
        ],200);
    }
}
