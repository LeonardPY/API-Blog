<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

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
}
