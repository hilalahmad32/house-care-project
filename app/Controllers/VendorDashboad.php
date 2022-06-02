<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Order;

class VendorDashboad extends BaseController
{
    public function index()
    {
        $order = new Order();
        $all = $order->orderBy('orders_id', 'DESC')->countAllResults();
        $pendding = $order->orderBy('orders_id', 'DESC')->where('status', 0)->countAllResults();
        $complete  = $order->orderBy('orders_id', 'DESC')->where('status', 1)->countAllResults();
        $reject = $order->orderBy('orders_id', 'DESC')->where('status', 2)->countAllResults();
        $data = [
            'all' => $all,
            'reject' => $reject,
            'pendding' => $pendding,
            'complete' => $complete,
        ];
        return view('partner/dashboard', $data);
    }
}
