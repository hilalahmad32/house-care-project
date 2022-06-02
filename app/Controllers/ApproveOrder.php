<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddToCart;
use App\Models\AssignToVendor;

class ApproveOrder extends BaseController
{
    public function index()
    {
        $assgin = new AssignToVendor();
        $assgins = $assgin->orderBy('ass_id', 'DESC')
            ->join('users', 'users.user_id=assign_to_vendors.u_id')
            ->join('packages', 'packages.pack_id=assign_to_vendors.p_id')
            ->join('add_to_cart', 'add_to_cart.cart_id=assign_to_vendors.c_id')
            ->findAll();
        return view('partner/approve-order', ['assgins' => $assgins]);
    }

    public function approve($id)
    {
        $assgin = new AssignToVendor();
        $assigns = $assgin->find($id);
        $carts = new AddToCart();
        $cart = $carts->find($assigns['c_id']);
        $data = [
            'status' => 1,
        ];
        $carts->update($cart['cart_id'], $data);
        return redirect()->to('vendor/approve-order');
    }
}
