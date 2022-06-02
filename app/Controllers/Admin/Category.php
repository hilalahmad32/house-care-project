<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Category as ModelsCategory;

class Category extends BaseController
{
    public function index()
    {
        $category = new ModelsCategory();
        $categorys = $category->orderBy('category_id', 'DESC')->findAll();
        return view('admins/category', ['categorys' => $categorys]);
    }


    public function add()
    {
        return view('admins/add-category');
    }

    public function createCategory()
    {
        $categorys = new ModelsCategory();
        $validation = $this->validate([
            'category_name' => ['required', 'string'],
        ]);
        if (!$validation) {
            return view('admins/add-category', [
                'validation' => $this->validator
            ]);
        } else {
            $file = $this->request->getFile('image');
            $icons = $this->request->getFile('icons');
            $category_name = $this->request->getVar('category_name');
            $newName = "";
            $iconName = "";
            if ($file->isValid() && !$file->hasMoved() || $icons->isValid() && !$icons->hasMoved()) {

                $newName = $file->getRandomName();
                $file->move("admins/uploads/", $newName);
                $iconName = $icons->getRandomName();
                $icons->move("admins/uploads/", $iconName);
            }
            $data = [
                'category_name' => $category_name,
                'icons' => $iconName,
                'image' => $newName,
            ];
            $result = $categorys->save($data);
            if ($result) {
                return redirect()->to('/admin/category')->with('success', 'Category Add successfully');
            } else {
                return redirect()->to('/admin/category/add')->with('error', 'Category Not Add Successfully');
            }
        }
    }

    public function edit($id)
    {
        $category = new ModelsCategory();
        $categorys = $category->find($id);
        return view('admins/edit-category', ['categorys' => $categorys]);
    }

    public function update()
    {
        $products = new ModelsCategory();

        $new_image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $category_name = $this->request->getVar('category_name');
        $icons = $this->request->getVar('icons');
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
            'category_name' => $category_name,
            'icons' => $icons,
            'image' => $newImage,
        ];
        $result = $products->update($id, $data);
        if ($result) {
            return redirect()->to('/admin/category')->with('success', 'Category Update Successfully');
        } else {
            return redirect()->to('/admin/category/edit/' . $id)->with('error', 'Server Problem');
        }
    }

    public function delete($id)
    {

        $categorys = new ModelsCategory();
        $get = $categorys->find($id);
        $path = "admins/uploads/" . $get['image'];
        if (file_exists($path)) {
            unlink($path);
        }
        $result = $categorys->delete($id);
        if ($result) {
            session()->setFlashdata('success', 'Category deleted successfully');
            return redirect()->to('/admin/category');
        } else {
            return redirect()->to('/admin/category')->with('error', 'Some problem');
        }
    }
}
