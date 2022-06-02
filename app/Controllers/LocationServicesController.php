<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Services;

class LocationServicesController extends BaseController
{
    public function index($id)
    {
        $service = new Services();
        $services = $service->where('loc_id', $id)->findAll();
        return view('locations_services', ['services' => $services]);
    }
}
