<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Order as ModelsOrder;

class Order extends BaseController
{
    public function index()
    {
        $order = new ModelsOrder();
        $orders = $order->orderBy('orders_id', 'DESC')->paginate(3);

        $data = [
            'orders' => $orders,
            'pager' => $order->pager,
        ];
        return view('my-order', $data);
    }
}
