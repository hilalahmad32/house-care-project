<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Location as ModelsLocation;

class Location extends BaseController
{
    public function index()
    {
        $location = new ModelsLocation();
        $locations = $location->orderBy('location_id', 'DESC')->findAll();
        return view('admins/location', ['locations' => $locations]);
    }

    public function add()
    {
        return view('admins/add-location');
    }

    public function createLocation()
    {
        $categorys = new ModelsLocation();
        $validation = $this->validate([
            'location' => ['required', 'string']
        ]);
        if (!$validation) {
            return view('admins/add-location', ['validation' => $validation]);
        } else {
            $location = $this->request->getVar('location');

            $data = [
                'location' => $location,
            ];
            $result = $categorys->save($data);
            if ($result) {
                return redirect()->to('/admin/location')->with('success', 'Location add successfully');
            } else {
                return redirect()->to('/admin/location/add')->with('error', 'Server problem');
            }
        }
    }
    public function edit($id)
    {
        $location = new ModelsLocation();
        $locations = $location->find($id);
        return view('/admins/edit-location', ['locations' => $locations]);
    }

    public function update()
    {
        $categorys = new ModelsLocation();
        $location = $this->request->getVar('location');
        $id = $this->request->getVar('id');

        $data = [
            'location_id' => $id,
            'location' => $location,
        ];
        $result = $categorys->save($data);
        if ($result) {
            return redirect()->to('/admin/location');
        } else {
            return redirect()->to('/admin/location/update/' . $id);
        }
    }

    public function delete($id)
    {
        $locations = new ModelsLocation();
        $result = $locations->delete($id);
        return redirect()->to('/admin/location');
    }
}
