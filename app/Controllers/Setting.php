<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Footer;
use App\Models\Header;
use App\Models\Menu;

class Setting extends BaseController
{
    public function index()
    {
        $headers = new Header();
        $header = $headers->find(1);
        $footers = new Footer();
        $footer = $footers->find(1);
        $menu = new Menu();
        $menus = $menu->find();
        $data = [
            'header' => $header,
            'menus' => $menus,
            'footer' => $footer,
        ];
        return view('admins/settings', $data);
    }

    public function updateHeader()
    {
        $headers = new Header();
        $id = $this->request->getVar('header_id');
        $title = $this->request->getVar('title');
        $image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $newName = "";
        if ($image != "") {
            $path = "admins/uploads/" . $old_image;
            if (file_exists($path)) {
                unlink($path);
            }
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move("admins/uploads/", $newName);
            }
        } else {
            $newName = $old_image;
        }
        $data = [
            'title' => $title,
            'image' => $newName,
        ];
        $headers->update($id, $data);
        return redirect()->to('/admin/setting');
    }

    public function editMenu()
    {
        $id = $this->request->getVar('id');
        $menu = new Menu();
        $menus = $menu->find($id);
        $output = " 
        <div class='form-group'>
            <label>Add Menu</label>
            <input type='text' id='menu'  value='{$menus['menu']}' class='form-control border-input' id='title'
                placeholder='Title' name='title'>
            <input type='hidden'  id='menId' value='{$menus['menu_id']}' class='form-control border-input' id='menu_id'
                placeholder='Title' name='menu_id'>
        </div> ";
        echo $output;
    }

    public function updateMenu()
    {
        $menus = new Menu();
        $id = $this->request->getVar('id');
        $menu = $this->request->getVar('menu');
        $data = [
            'menu' => $menu,
        ];
        $menus->update($id, $data);
        echo 1;
    }
    public function updateFooter()
    {
        $footers = new Footer();
        $id = $this->request->getVar('footer_id');
        $footer_title = $this->request->getVar('footer_title');
        $footer_desc = $this->request->getVar('footer_desc');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $location = $this->request->getVar('location');
        $fb_link = $this->request->getVar('fb_link');
        $insta_link = $this->request->getVar('insta_link');
        $twt_link = $this->request->getVar('twt_link');
        $image = $this->request->getFile('new_image');
        $old_image = $this->request->getVar('old_image');
        $newName = "";
        if ($image != "") {
            $path = "admins/uploads/" . $old_image;
            if (file_exists($path)) {
                unlink($path);
            }
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move("admins/uploads/", $newName);
            }
        } else {
            $newName = $old_image;
        }
        $data = [
            'footer_title' => $footer_title,
            'footer_image' => $newName,
            'fb_link' => $fb_link,
            'insta_link' => $insta_link,
            'twt_link' => $twt_link,
            'footer_desc' => $footer_desc,
            'phone' => $phone,
            'email' => $email,
            'location' => $location,
        ];
        $footers->update($id, $data);
        return redirect()->to('/admin/setting');
    }
}
