<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Location;
use App\Models\Order;
use App\Models\Package;
use App\Models\Partner;
use App\Models\Role;
use App\Models\Services;
use App\Models\User;

class Dashboad extends BaseController
{
    public function index()
    {
        $categorys = new Category();
        $category = $categorys->countAllResults();
        $locations = new Location();
        $location = $locations->countAllResults();
        $services = new Services();
        $service = $services->countAllResults();
        $packages = new Package();
        $package = $packages->countAllResults();
        $orders = new Order();
        $order = $orders->countAllResults();
        $partners = new Partner();
        $partner = $partners->countAllResults();
        $banners = new Banner();
        $banner = $banners->countAllResults();
        $users = new User();
        $user = $users->countAllResults();
        $roles = new Role();
        $role = $roles->countAllResults();
        $admins = new Admin();
        $admin = $admins->countAllResults();

        $data = [
            'category' => $category,
            'location' => $location,
            'service' => $service,
            'package' => $package,
            'order' => $order,
            'partner' => $partner,
            'banner' => $banner,
            'user' => $user,
            'role' => $role,
            'admin' => $admin,
        ];
        return view('admins/dashboard', $data);
    }
}
