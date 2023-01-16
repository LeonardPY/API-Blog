<?php

namespace App\Http\Controllers\Comment;


use App\Http\Controllers\Controller;
use App\Services\Comment\Services;

class BaseController extends Controller
{
    public $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }
}
