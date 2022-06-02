<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin as ModelsAdmin;

class Admin extends BaseController
{
    public function index()
    {
        return view('admins/login');
    }

    public function create()
    {
        $admins = new ModelsAdmin();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');


        $admins = $admins->where('username', $username)->first();

        if ($admins) {
            if (password_verify($password, $admins['password'])) {
                $data = [
                    'admin_id' => $admins['admin_id'],
                    'admin_name' => $admins['username'],
                ];
                session()->set($data);
                return redirect()->to('admin/category')->with('success', 'Admin Login Successfully');
            } else {
                return redirect()->to('admin')->with('error', 'Invalid username and password');
            }
        } else {
            return redirect()->to('admin')->with('error', 'Invalid username and password');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/');
    }
}
