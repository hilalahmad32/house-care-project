<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Location;
use App\Models\PackagesGallery;
use App\Models\Services;

class AdminService extends BaseController
{
    public function index()
    {
        $service = new Services();
        $services = $service->orderBy('service_id', 'DESC')->paginate(3);
        $data = [
            'services' => $services,
            'pager' => $service->pager
        ];
        return view('admins/services', $data);
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
        $categorys = new Category();
        $gallerys = new PackagesGallery();

        $files = $this->request->getFileMultiple('images');

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
        if ($files) {
            foreach ($files as $file1) {
                $gal = "";
                if ($file1->isValid() && !$file1->hasMoved()) {
                    $gal = $file1->getRandomName();
                    $file1->move("admins/uploads/gallery/", $gal);
                }
                $data1 = [
                    'sr_id' => $services->getInsertID(),
                    'images' => $gal,
                ];
                $gallerys->save($data1);
            }
        }

        if ($result) {
            $category = $categorys->where('category_id', $cat_id)->first();
            $data1 = [
                'cat_services' => $category['cat_services'] + 1,
            ];
            $categorys->update($category['category_id'], $data1);
            return redirect()->to('/admin/service')->with('success', 'Service Add Successfully');
        } else {
            return redirect()->to('/admin/service/add');
        }
    }

    public function edit($id)
    {
        $service = new Services();
        $location = new Location();
        $category = new Category();
        $categorys = $category->orderBy('category_id', 'DESC')->findAll();
        $locations = $location->orderBy('location_id', 'DESC')->findAll();
        $services = $service->find($id);
        return view('admins/edit-service', ['services' => $services, 'locations' => $locations, 'categorys' => $categorys,]);
    }

    public function update()
    {
        $services = new Services();
        $categorys = new Category();

        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $service_name = $this->request->getVar('service_name');
        $old = $this->request->getVar('old_category');
        $cat_id = $this->request->getVar('cat_id');
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
            'cat_id' => $cat_id,
            'image' => $newImage,
        ];
        $result = $services->update($id, $data);
        $category = $categorys->where('category_id', $cat_id)->first();
        $category1 = $categorys->where('category_id', $old)->first();
        if ($old != $cat_id) {
            $data1 = [
                'cat_services' => $category['cat_services'] + 1,
            ];
            $data2 = [
                'cat_services' => $category1['cat_services'] - 1,
            ];

            $categorys->update($category['category_id'], $data1);
            $categorys->update($category1['category_id'], $data2);
        }
        if ($result) {

            return redirect()->to('/admin/service');
        } else {
            return redirect()->to('/admin/service');
        }
    }


    public function delete($id)
    {

        $services = new Services();
        $pgs = new PackagesGallery();
        $get = $services->find($id);
        $pg = $pgs->where('sr_id', $id)->findAll();
        $paths = "";
        foreach ($pg as $image) {
            $paths = "admins/uploads/gallery/" . $image['images'];
            if (file_exists($paths)) {
                unlink($paths);
            }
            $pgs->delete($image['g_id']);
        }
        $path = "admins/uploads/" . $get['image'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $services->delete($id);
        return redirect()->to('/admin/service');
    }
}
