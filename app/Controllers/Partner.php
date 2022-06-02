<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Partner as ModelsPartner;

class Partner extends BaseController
{
    public function register()
    {
        $users = new ModelsPartner();
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $phone = $this->request->getVar("phone");
        $password = $this->request->getVar("password");

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        $result = $users->save($data);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function login()
    {
        return view('partner/login');
    }

    public function loggedIn()
    {
        $partner = new ModelsPartner();
        $validation = $this->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if (!$validation) {
            return view('partner/login', [
                'validation' => $this->validator
            ]);
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $partners = $partner->where('email', $email)->first();
            if ($partners) {
                if (password_verify($password, $partners['password'])) {
                    $data = [
                        'v_id' => $partners['part_id'],
                        'v_name' => $partners['name'],
                    ];
                    session()->set($data);
                    return redirect()->to('vendor/dashboard')->with('success', 'Vendor Login Successfully');
                } else {
                    return redirect()->to('admin')->with('error', 'Invalid username and password');
                }
            } else {
                return redirect()->to('admin')->with('error', 'Invalid username and password');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/partner/login');
    }
}
