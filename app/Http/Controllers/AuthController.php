<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    //registr
    public function register(RegisterRequest $request)
    {
        $request = $request->validated();
        $response = $this->services->store($request);
        return $response;
    }
}
