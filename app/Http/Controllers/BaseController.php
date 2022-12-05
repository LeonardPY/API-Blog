<?php

namespace App\Http\Controllers;



use App\Services\Auth\Services;

class BaseController extends Controller
{
    public $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }
}
