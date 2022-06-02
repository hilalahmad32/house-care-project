<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminNotify;
use App\Models\Order;
use App\Models\User;
use App\Models\UserNotify;

class VendorOrder extends BaseController
{
    public function index()
    {
        $order = new Order();
        $orders = $order->orderBy('orders_id', 'DESC')->paginate(4);
        $orders1 = $order->orderBy('orders_id', 'DESC')->where('status', 0)->paginate(3);
        $orders2 = $order->orderBy('orders_id', 'DESC')->where('status', 1)->paginate(3);
        $orders3 = $order->orderBy('orders_id', 'DESC')->where('status', 2)->paginate(3);
        $data = [
            'orders' => $orders,
            'orders1' => $orders1,
            'orders2' => $orders2,
            'orders3' => $orders3,
            'pager' => $order->pager,
        ];
        return view('partner/orders', $data);
    }

    public function approve($id)
    {
        $order = new Order();
        $user = new User();
        $notifies = new UserNotify();
        $orders = $order->find($id);
        $email = $orders['email'];

        $users = $user->where('email', $email)->first();
        $u_id = $users['user_id'];
        $v_id = session()->get('v_id');
        $data = [
            'status' => 1,
        ];
        $result = $order->update($id, $data);
        if ($result) {

            $data1 = [
                'v_id' => $v_id,
                'u_id' => $u_id,
                'message' => 'Vendor Approve Your Order',
                'no_status' => 1,
            ];
            $notifies->save($data1);
            $notify = new AdminNotify();
            $data2 = [
                'message' => '<strong>' . session()->get('v_name') . '</strong> Vendor Approve Assiged Order',
            ];
            $notify->save($data2);
            return redirect()->to('vendor/orders');
        }
    }
    public function reject($id)
    {
        $order = new Order();
        $data = [
            'status' => 2,
        ];
        $order->update($id, $data);
        return redirect()->to('vendor/orders');
    }

    public function view()
    {
        $order = new Order();
        $id = $this->request->getVar('id');
        $output = "";
        $orders = $order->where('orders_id', $id)->first();
        $output .= "
            <ul>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>Name</span>
            <span>{$orders['name']}</span>
            </li>
            <hr>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>Email</span>
            <span>{$orders['email']}</span>
            </li>
            <hr>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>State</span>
            <span>{$orders['state']}</span>
            </li>
            <hr>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>Address</span>
            <span>{$orders['address']}</span>
            </li>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>City</span>
            <span>{$orders['city']}</span>
            </li>
            <hr>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>Payment Method</span>
            <span>";
        if ($orders['payment_method'] == 1) {
            $output .= "Paypal";
        } elseif ($orders['payment_method'] == 2) {
            $output .= "Google Pay";
        } elseif ($orders['payment_method'] == 3) {
            $output .= "Cash on Delivery";
        }
        $output .= "</span>
            </li>
            <hr>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>Quantity</span>
            <span>{$orders['qty']}</span>
            </li>
            <hr>
            <li style='display:flex;justify-content:space-between; margin:10px 0px;font-size:20px;'>
            <span>Total Price</span>
            <span>{$orders['total_price']}</span>
            </li>
            
            </ul>
            ";
        echo $output;
    }
}
