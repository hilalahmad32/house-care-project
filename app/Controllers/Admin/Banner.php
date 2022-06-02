<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Banner as ModelsBanner;

class Banner extends BaseController
{
    public function index()
    {
        $banner = new ModelsBanner();
        $banners = $banner->orderBy('banner_id', 'DESC')->paginate();
        $data = [
            'banners' => $banners,
            'pager' => $banner->pager
        ];
        return view('admins/banner', $data);
    }

    public function add()
    {
        return view('admins/add-banner');
    }

    public function create()
    {
        $banner = new ModelsBanner();
        $file = $this->request->getFile('image');
        $title = $this->request->getVar('title');
        $content = $this->request->getVar('content');
        $newName = "";
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move("admins/uploads/", $newName);
        }
        $data = [
            'title' => $title,
            'content' => $content,
            'image' => $newName,
        ];
        $result = $banner->save($data);
        if ($result) {
            return redirect()->to('/admin/banner');
        } else {
            return redirect()->to('/admin/banner/add');
        }
    }
    public function edit($id)
    {
        $banner = new ModelsBanner();
        $banners = $banner->find($id);
        return view('admins/edit-banner', ['banners' => $banners]);
    }

    public function update()
    {
        $banners = new ModelsBanner();

        // $product=$banners->find($id);
        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $title = $this->request->getVar('title');
        $content = $this->request->getVar('content');
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
            'banner_id' => $id,
            'title' => $title,
            'content' => $content,
            'image' => $newImage,
        ];
        $result = $banners->save($data);
        if ($result) {
            return redirect()->to('/admin/banner');
        } else {
            return redirect()->to('/admin/banner');
        }
    }


    public function delete($id)
    {
        $banners = new ModelsBanner();
        $get = $banners->find($id);
        $path = "admins/uploads/" . $get['image'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $banners->delete($id);
        return redirect()->to('/admin/banner');
    }
}
