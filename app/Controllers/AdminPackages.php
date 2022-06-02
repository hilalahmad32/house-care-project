<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Package;
use App\Models\PackagesGallery;
use App\Models\Services;

class AdminPackages extends BaseController
{
    public function index()
    {
        $package = new Package();
        $packages = $package->orderBy('pack_id', 'DESC')->paginate(3);
        $data = [
            'packages' => $packages,
            'pager' => $package->pager
        ];
        return view('admins/packages', $data);
    }

    public function add()
    {
        $service = new Services();
        $services = $service->orderBy('service_id', 'DESC')->findAll();
        return view('admins/add-packages', ['services' => $services]);
    }

    public function create()
    {
        $packages = new Package();
        $services = new Services();
        $file = $this->request->getFile('image');
        $service_id = $this->request->getVar('service_id');
        $title = $this->request->getVar('title');
        $video = $this->request->getFile('video');
        $price = $this->request->getVar('price');
        $description = $this->request->getVar('description');
        $newName = "";
        $newVideos = "";
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("admins/uploads/", $newName);
        }
        if ($video->isValid() && !$video->hasMoved()) {
            $newVideos = $video->getRandomName();
            $video->move("admins/uploads/", $newVideos);
        }
        $data = [
            'title' => $title,
            'description' => $description,
            'price' => $price,
            'service_id' => $service_id,
            'image' => $newName,
            'video' => $newVideos,
        ];
        $result = $packages->save($data);
        $service = $services->where('service_id', $service_id)->first();
        $data3 = [
            's_pack' => $service['s_pack'] + 1,
        ];
        $services->update($service['service_id'], $data3);

        if ($result) {
            return redirect()->to('/admin/packages');
        } else {
            return redirect()->to('/admin/packages/add');
        }
    }
    public function edit($id)
    {
        $package = new Package();
        $service = new Services();
        $services = $service->orderBy('service_id', 'DESC')->findAll();
        $packages = $package->find($id);
        return view('admins/edit-packages', ['packages' => $packages, 'services' => $services]);
    }

    public function update()
    {
        $packages = new Package();
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
        $packages = new Package();


        $get = $packages->find($id);

        $path = "admins/uploads/" . $get['image'];
        $path1 = "admins/uploads/" . $get['video'];
        if (file_exists($path)) {
            unlink($path);
        }
        if (file_exists($path1)) {
            unlink($path1);
        }
        $result = $packages->delete($id);
        return redirect()->to('/admin/packages');
    }
}
