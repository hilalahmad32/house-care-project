<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class AdminUser extends BaseController
{
    public function index()
    {
        $user = new User();
        $users = $user->orderBy('user_id', 'DESC')->paginate(3);
        $data = [
            'users' => $users,
            'pager' => $user->pager
        ];
        return view('admins/users', $data);
    }
    public function delete($id)
    {
        $user = new User();
        $user->delete($id);
        return redirect()->to('admin/users');
    }

    public function edit($id)
    {
        $user = new User();
        $users = $user->find($id);
        return view('admins/edit-users', ['users' => $users]);
    }
    public function update()
    {
        $user = new User();
        $id = $this->request->getVar('id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $address = $this->request->getVar('address');
        $state = $this->request->getVar('state');
        $city = $this->request->getVar('city');
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'state' => $state,
            'address' => $address,
        ];
        $user->update($id, $data);
        return redirect()->to('admin/users');
    }
}
