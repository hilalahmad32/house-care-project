<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddToCart;
use App\Models\Package as ModelsPackage;
use App\Models\ServiceRating;
use App\Models\Services;

class Package extends BaseController
{
    public function index($id)
    {
        $service = new Services();
        $services = $service->find($id);
        $service_name = $services['service_name'];
        $s_id = $services['service_id'];
        $package = new ModelsPackage();
        $packages = $package->where('service_id', $id)->findAll();

        $review = new ServiceRating();
        $reviews = $review->orderBy('rat_id', 'DESC')->where(['s_id' => $id, 'u_id' => session()->get('user_id')])->join('users', 'users.user_id=service_ratings.u_id')->findAll();
        return view('packages', ['reviews' => $reviews, 'packages' => $packages, 's_id' => $s_id, 's_name' => $service_name]);
    }

    public function addToCart($id, $sid)
    {
        $addtocart = new AddToCart();
        $package = new ModelsPackage();
        $packages = $package->find($id);
        $uid = session()->get('user_id');

        $is_cart = $addtocart->where(['pk_id' => $id, 'u_id' => $uid])->first();
        if ($is_cart) {
            return redirect()->to('/services/packages/' . $sid)->with('error', 'This package is already in your card Please update your card');
        } else {
            $data = [
                'u_id' => $uid,
                'pk_id' => $id,
                'total_price' => $packages['price'],
                'qty' => 1,

            ];
            $result = $addtocart->save($data);
            if ($result) {
                return redirect()->to('/services/packages/' . $sid)->with('success', 'Package Successfully Add to Card');
            } else {
                return redirect()->to('/services/packages/' . $sid)->with('error', 'Server Problem');
            }
        }
    }
    public function rating($id)
    {
        $ratings = new ServiceRating();
        if (session()->get('user_id')) {
            $sid = session()->get('user_id');
        }

        $rate = $this->request->getVar('rating');
        $data = [
            'u_id' => $sid,
            's_id' => $id,
            'rating' => $rate,
        ];
        $ratings->save($data);
        return redirect()->to('/services/packages/' . $id);
    }
}
