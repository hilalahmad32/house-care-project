<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin as ModelsAdmin;
use App\Models\AdminNotify;
use App\Models\Role;

class Admin extends BaseController
{
    // show admin login page
    public function index()
    {
        // load view from view/admins/login.php
        return view('admins/login');
    }
    // admin login 
    public function login()
    {
        // create a instance of Admin Model
        $admins = new ModelsAdmin();
        // make a validation 
        $validation = $this->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);
        if (!$validation) {
            return view('admins/login', [
                'validation' => $this->validator
            ]);
        } else {
            // get form value from form
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            // get admin by username
            $admins = $admins->where('username', $username)->first();
            // check the admin is valid or not valid
            if ($admins) {
                // verify the password is equal or not
                if (password_verify($password, $admins['password'])) {
                    $data = [
                        'admin_id' => $admins['admin_id'],
                        'admin_name' => $admins['username'],
                    ];
                    // store admin in session
                    session()->set($data);
                    // redirect if admin is valid 
                    return redirect()->to('admin/dashboard')->with('success', 'Admin Login Successfully');
                } else {
                    // else not valid redirect in login page
                    return redirect()->to('admin')->with('error', 'Invalid username and password');
                }
            } else {
                // else not valid redirect in login page
                return redirect()->to('admin')->with('error', 'Invalid username and password');
            }
        }
    }

    public function logout()
    {
        echo "logout successfully";
        session()->destroy();
        return redirect()->to('/admin/');
    }
    public function notify()
    {
        $notify = new AdminNotify();
        $notifys = $notify->orderBy('not_id', 'DESC')
            ->findAll();
        $output = "";
        foreach ($notifys as $not) {
            $output .= "<li><a> {$not['message']}</a></li>";
        }
        echo $output;
    }

    public function total()
    {
        $notify = new AdminNotify();
        $notifys = $notify->where(['no_status' => 1])->countAllResults();
        $output = $notifys;
        echo $output;
    }

    public function updatenotify()
    {
        $notify = new AdminNotify();
        $notifys1 = $notify->where('no_status', 1)->findAll();
        foreach ($notifys1 as $not) {
            $data = [
                'no_status' => 0,
            ];
            $notify->update($not['not_id'], $data);
        }
    }
}
