<?php

namespace App\Http\Controllers\Like;

use App\Http\Controllers\Controller;
use App\Services\Like\Services;

class LikeController extends Controller
{
    // like or unlike
    public function likeOrUnlike($id)
    {
        $service = resolve(Services::class);
        return $service->likeOrUnlike($id);
    }
}
