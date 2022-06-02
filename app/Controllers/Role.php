<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Role as ModelsRole;

class Role extends BaseController
{
    public function index()
    {
        $role = new ModelsRole();
        $roles = $role->orderBy('role_id', 'DESC')->paginate(3);
        $data = [
            'roles' => $roles,
            'pager' => $role->pager
        ];
        return view('admins/role', $data);
    }
    public function add()
    {
        return view('admins/add-role');
    }

    public function createRole()
    {
        $roles = new ModelsRole();
        $validation = $this->validate([
            'role' => ['required', 'string']
        ]);
        if (!$validation) {
            return view('admins/add-role', ['validation' => $validation]);
        } else {
            $role = $this->request->getVar('role');

            $data = [
                'role' => $role,
            ];
            $result = $roles->save($data);
            if ($result) {
                return redirect()->to('/admin/role')->with('success', 'role add successfully');
            } else {
                return redirect()->to('/admin/role/add')->with('error', 'Server problem');
            }
        }
    }

    public function edit($id)
    {
        $role = new ModelsRole();
        $roles = $role->find($id);
        return view('/admins/edit-role', ['roles' => $roles]);
    }

    public function update()
    {
        $roles = new ModelsRole();
        $role = $this->request->getVar('role');
        $id = $this->request->getVar('id');
        $data = [
            'role' => $role,
        ];
        $result = $roles->update($id, $data);
        if ($result) {
            return redirect()->to('/admin/role');
        } else {
            return redirect()->to('/admin/role/update/' . $id);
        }
    }
    public function delete($id)
    {
        $roles = new ModelsRole();
        $result = $roles->delete($id);
        return redirect()->to('/admin/role');
    }
}
