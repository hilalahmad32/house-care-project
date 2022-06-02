<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AddToCart as ModelsAddToCart;

class AddToCart extends BaseController
{
    public function index()
    {
        $cart = new ModelsAddToCart();
        $carts = $cart->orderBy('cart_id', 'DESC')
            ->join('users', 'users.user_id=add_to_cart.u_id')
            ->join('packages', 'packages.pack_id=add_to_cart.pk_id')->findAll();
        return view('admins/orders', ['carts' => $carts]);
    }

    public function assign($id)
    {
        echo $id;
    }
}
