<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Thankyou extends BaseController
{
    public function index()
    {
        return view('thankyou');
    }
}
