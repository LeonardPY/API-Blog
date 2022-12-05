<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Services\Auth\Services;

class BaseController extends Controller
{
    public $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }
}
