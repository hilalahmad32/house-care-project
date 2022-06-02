<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Package as ModelsPackage;
use App\Models\Services;

class Package extends BaseController
{
    public function index()
    {
        $package = new ModelsPackage();
        $packages = $package->orderBy('pack_id', 'DESC')->findAll();
        return view('admins/packages', ['packages' => $packages]);
    }

    public function add()
    {
        $service = new Services();
        $services = $service->orderBy('service_id', 'DESC')->findAll();
        return view('admins/add-packages', ['services' => $services]);
    }

    public function create()
    {
        $packages = new ModelsPackage();
        $file = $this->request->getFile('image');
        $service_id = $this->request->getVar('service_id');
        $title = $this->request->getVar('title');

        $price = $this->request->getVar('price');
        $description = $this->request->getVar('description');
        $newName = "";
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("admins/uploads/", $newName);
        }
        $data = [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'service_id' => $service_id,
            'image' => $newName,
        ];
        $result = $packages->save($data);
        if ($result) {
            return redirect()->to('/admin/packages');
        } else {
            return redirect()->to('/admin/packages/add');
        }
    }
    public function edit($id)
    {
        $package = new ModelsPackage();
        $service = new Services();
        $services = $service->orderBy('service_id', 'DESC')->findAll();
        $packages = $package->find($id);
        return view('admins/edit-packages', ['packages' => $packages, 'services' => $services]);
    }

    public function update()
    {
        $packages = new ModelsPackage();
        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $id = $this->request->getVar('id');
        $service_id = $this->request->getVar('service_id');
        $title = $this->request->getVar('title');
        $price = $this->request->getVar('price');
        $description = $this->request->getVar('description');
        $newName = "";
        if ($new_image != "") {
            $path = "admins/uploads/" . $old_image;
            if (file_exists($path)) {
                unlink($path);
            }
            if ($new_image->isValid() && !$new_image->hasMoved()) {
                $newName = $new_image->getRandomName();
                $new_image->move("admins/uploads/", $newName);
            }
        } else {
            $newName = $old_image;
        }


        $data = [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'service_id' => $service_id,
            'image' => $newName,
        ];
        $result = $packages->update($id, $data);
        if ($result) {
            return redirect()->to('/admin/packages');
        } else {
            return redirect()->to('/admin/packages');
        }
    }

    public function delete($id)
    {

        $packages = new ModelsPackage();
        $get = $packages->find($id);
        $path = "admins/uploads/" . $get['image'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $packages->delete($id);
        return redirect()->to('/admin/packages');
    }
}
