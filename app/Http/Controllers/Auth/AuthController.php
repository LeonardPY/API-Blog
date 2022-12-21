<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateRequest;

class AuthController extends BaseController
{
    //registr
    public function register(RegisterRequest $request)
    {
        $request = $request->validated();
        $response = $this->services->store($request);
        return $response;
    }

    //login
    public function login(LoginRequest $request)
    {
        $request = $request->validated();
        $response = $this->services->login($request);
        return $response;
    }

    //logout
    public  function logout()
    {
        return $this->services->logout();
    }

    // get user detalis
    public function user()
    {
        return $this->services->user();
    }

    // update user detalis
    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        return $this->services->update($data);
    }
}
