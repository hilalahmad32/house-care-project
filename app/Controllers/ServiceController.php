<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Services;

class ServiceController extends BaseController
{
    public function index($id)
    {
        return view('services');
    }
}
