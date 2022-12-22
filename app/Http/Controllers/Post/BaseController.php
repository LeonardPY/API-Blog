<?php

namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Services\Post\Services;

class BaseController extends Controller
{
    public $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }
}
