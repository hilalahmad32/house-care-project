<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Location;

class AdminLocation extends BaseController
{
    public function index()
    {
        $location = new Location();
        $locations = $location->orderBy('location_id', 'DESC')->paginate(3);
        $data = [
            'locations' => $locations,
            'pager' => $location->pager
        ];
        return view('admins/location', $data);
    }

    public function add()
    {
        return view('admins/add-location');
    }

    public function createLocation()
    {
        $categorys = new Location();
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
        $location = new Location();
        $locations = $location->find($id);
        return view('/admins/edit-location', ['locations' => $locations]);
    }

    public function update()
    {
        $categorys = new Location();
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
        $locations = new Location();
        $result = $locations->delete($id);
        return redirect()->to('/admin/location');
    }
}
