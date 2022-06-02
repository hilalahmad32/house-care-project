<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Role;

class Staff extends BaseController
{
    public function index()
    {
        $admin = new Admin();
        $admins = $admin->orderBy('admin_id', 'DESC')->paginate(3);
        $data = [
            'admins' => $admins,
            'pager' => $admin->pager
        ];
        return view('admins/staff', $data);
    }
    public function create()
    {
        $admins = new Admin();
        $name = $this->request->getVar("name");
        $username = $this->request->getVar("username");
        $role = $this->request->getVar("role");
        $email = $this->request->getVar("email");
        $phone = $this->request->getVar("phone");
        $password = $this->request->getVar("password");

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $result = $admins->save($data);
        if ($result) {
            return redirect()->to('/admin/staff');
        } else {
            return redirect()->to('/admin/add.admins');
        }
    }
    public function add()
    {
        $role = new Role();
        $roles = $role->orderBy('role_id', 'DESC')->findAll();
        $data = [
            'roles' => $roles,
        ];
        return view('admins/add-staff', $data);
    }
    public function delete($id)
    {
        $admin = new Admin();
        $admin->delete($id);
        return redirect()->to('admin/staff');
    }

    public function edit($id)
    {
        $admin = new Admin();
        $admins = $admin->find($id);
        $role = new Role();
        $roles = $role->orderBy('role_id', 'DESC')->findAll();
        $data = [
            'roles' => $roles,
            'admins' => $admins
        ];
        return view('admins/edit-staff', $data);
    }
    public function update()
    {
        $admin = new Admin();
        $id = $this->request->getVar('admin_id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $username = $this->request->getVar('username');
        $role = $this->request->getVar('role');
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'role' => $role,
            'username' => $username,
        ];
        $admin->update($id, $data);
        return redirect()->to('admin/staff');
    }
}
