<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddToCart as ModelsAddToCart;
use App\Models\AssignToVendor;
use App\Models\Partner;
use PhpParser\Node\Expr\Print_;

class AddToCart extends BaseController
{
    public function index()
    {
        $cart = new ModelsAddToCart();
        $carts = $cart->orderBy('cart_id', 'DESC')->paginate(3);
        $data = [
            'carts' => $carts,
        ];
        return view('admins/orders', $data);
    }

    public function assign($id)
    {
        $cart = new ModelsAddToCart();
        $carts = $cart->find($id);
        $partner = new Partner();
        $partners = $partner->where('status', 1)->orderBy('part_id', 'DESC')->findAll();
        return view('admins/assign-order', ['carts' => $carts, 'partners' => $partners]);
    }

    public function assignOder()
    {
        $assigns = new AssignToVendor();
        $id = $this->request->getVar('id');
        $v_id = $this->request->getVar('v_id');
        $u_id = $this->request->getVar('u_id');
        $p_id = $this->request->getVar('p_id');

        $data = [
            'c_id' => $id,
            'v_id' => $v_id,
            'u_id' => $u_id,
            'p_id' => $p_id,
        ];

        $assigns->save($data);
        return redirect()->to('admin/orders');
    }
}
