<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Location;
use App\Models\Services;

class Service extends BaseController
{
    public function index()
    {
        $service = new Services();
        $services = $service->orderBy('service_id', 'DESC')->findAll();
        return view('admins/services', ['services' => $services]);
    }

    public function add()
    {
        $location = new Location();
        $locations = $location->orderBy('location_id', 'DESC')->findAll();
        $category = new Category();
        $categorys = $category->orderBy('category_id', 'DESC')->findAll();
        return view('admins/add-services', ['locations' => $locations, 'categorys' => $categorys]);
    }

    public function create()
    {
        $services = new Services();
        $file = $this->request->getFile('image');
        $loc_id = $this->request->getVar('loc_id');
        $cat_id = $this->request->getVar('cat_id');
        $service_name = $this->request->getVar('service_name');
        $newName = "";
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("admins/uploads/", $newName);
        }
        $data = [
            'service_name' => $service_name,
            'loc_id' => $loc_id,
            'cat_id' => $cat_id,
            'image' => $newName,
        ];
        $result = $services->save($data);
        if ($result) {
            return redirect()->to('/admin/service');
        } else {
            return redirect()->to('/admin/service/add');
        }
    }

    public function edit($id)
    {
        $service = new Services();
        $location = new Location();
        $locations = $location->orderBy('location_id', 'DESC')->findAll();
        $services = $service->find($id);
        return view('admins/edit-service', ['services' => $services, 'locations' => $locations]);
    }

    public function update()
    {
        $services = new Services();

        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $service_name = $this->request->getVar('service_name');
        $loc_id = $this->request->getVar('loc_id');
        $id = $this->request->getVar('id');
        $newImage = "";
        if ($new_image != "") {
            $path = "admins/uploads/" . $old_image;
            if (file_exists($path)) {
                unlink($path);
            }
            if ($new_image->isValid() && !$new_image->hasMoved()) {
                $newImage = $new_image->getRandomName();
                $new_image->move("admins/uploads/", $newImage);
            }
        } else {
            $newImage = $old_image;
        }

        $data = [
            'service_name' => $service_name,
            'loc_id' => $loc_id,
            'image' => $newImage,
        ];
        $result = $services->update($id, $data);
        if ($result) {
            return redirect()->to('/admin/service');
        } else {
            return redirect()->to('/admin/service');
        }
    }


    public function delete($id)
    {

        $services = new Services();
        $get = $services->find($id);
        $path = "admins/uploads/" . $get['image'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $services->delete($id);
        return redirect()->to('/admin/service');
    }
}
