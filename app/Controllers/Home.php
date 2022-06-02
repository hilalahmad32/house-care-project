<?php

namespace App\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Services;

class Home extends BaseController
{
    public function index()
    {
        // create object of a model category class
        $category = new Category();
        // get all Category
        $categorys = $category->findAll();
        // show data in home page
        // banner 
        $banner = new Banner();
        $banners = $banner->orderBy('banner_id', 'DESC')->findAll();
        return view('home', ['categorys' => $categorys, 'banners' => $banners]);
    }
    public function services($id)
    {
        $service = new Services();
        $services = $service->where('cat_id', $id)->findAll();
        return view('services', ['services' => $services]);
    }
}
