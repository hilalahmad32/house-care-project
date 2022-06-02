<?php

namespace App\Controllers\User\Auth;

use App\Controllers\BaseController;
use App\Models\AddToCart;
use App\Models\Admin;
use App\Models\AdminNotify;
use App\Models\Order;
use App\Models\Package;
use App\Models\User as ModelsUser;
use App\Models\UserNotify;

class User extends BaseController
{
    public function index()
    {
        $users = new ModelsUser();
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $phone = $this->request->getVar("phone");
        $city = $this->request->getVar("city");
        $state = $this->request->getVar("state");
        $address = $this->request->getVar("address");
        $password = $this->request->getVar("password");

        $is_email = $users->where('email', $email)->first();
        if ($is_email) {
            echo 2;
        } else {
            $data = [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'city' => $city,
                'state' => $state,
                'address ' => $address,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            $result = $users->save($data);
            if ($result) {
                $notify = new AdminNotify();
                $data1 = [
                    'message' => 'New <strong>' . $name . '</strong> User are registered',
                ];
                $notify->save($data1);
                echo 1;
            } else {
                echo 0;
            }
        }
    }

    public function login()
    {
        $users = new ModelsUser();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $users = $users->where('email', $email)->first();

        if ($users) {
            if (password_verify($password, $users['password'])) {
                $data = [
                    'user_id' => $users['user_id'],
                    'username' => $users['name'],
                ];
                session()->set($data);
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->back();
    }

    public function cart()
    {

        $cart = new AddToCart();
        $carts = $cart->orderBy('cart_id', 'DESC')
            ->join('packages', 'add_to_cart.pk_id=packages.pack_id')
            ->where('u_id', session()->get('user_id'))
            ->findAll();
        $sum = $cart->where(['status' => 1, 'u_id' => session()->get('user_id')])->select('sum(qty),sum(total_price)')->findAll();
        $cart_data = "";
        $summary = "
        <h3>Payment Summary</h3>
        <ul class='mx-4'>
        <li class='d-flex justify-content-between'>
        <span>Quantity</span>
        <span>{$sum[0]['sum(qty)']}</span>
        </li>
        <hr>
        <li class='d-flex justify-content-end my-2'>
        <span>Total : </span>
        <span>{$sum[0]['sum(total_price)']}</span>
        </li>
        </ul>
        <div class='text-center my-3'>";
        if (!empty($sum)) {
            $summary .= " <a href='/users/proceed/order'><button class='btn'>Procced Payment</button></a>
        </div>
        ";
        } else {
            $summary .= " <button class='btn'>Procced Payment</button>
        </div>
        ";
        }
        $i = 1;
        foreach ($carts as $cart) {
            $cart_data .= "
        <tr>
        <th>{$i}</th>
        <th>{$cart['title']}</th>
        <th>{$cart['price']}</th>
        <th><form method='post' action='/users/carts/{$cart['cart_id']}'>
        <input type='hidden' name='_method' value='put' />
        <input type='number'  step='1' id='' min='1' max='10' value='{$cart['qty']}' name='qty' class='form-control' />
        </th>
        <th>" .
                $cart['total_price']
                . "</th>
                <th>
                            <button type='submit'>update</button>
                           <button id='deletecart' data-id='{$cart['cart_id']}' type='submit'>Delete</button>
                </form>
            </th>
            </tr>
        ";
            $i++;
        }
        return view('my-cart', ['carts' => $carts,  'summary' => $summary, 'cart_data' => $cart_data]);
    }



    public function update($id)
    {
        $carts = new AddToCart();
        $cart = $carts->join('packages', 'add_to_cart.pk_id=packages.pack_id')->find($id);
        $qty = $this->request->getVar('qty');
        $total_price = $cart['price'] * $qty;
        $data = [
            'qty' => $qty,
            'total_price' => $total_price,
        ];
        $carts->update($id, $data);
        return redirect()->to('users/carts');
    }

    public function proceed()
    {
        $users = new ModelsUser();
        $carts = new AddToCart();
        if (session()->get('user_id')) {
            $user_id = session()->get('user_id');
        }
        $user = $users->find($user_id);
        $cart = $carts->where(['status' => 1, 'u_id' => $user_id])->select('sum(qty),sum(total_price)')->findAll();

        return view('order', ['user' => $user, 'cart' => $cart]);
    }

    public function order()
    {
        $order = new Order();
        $data = [
            'payment_method' => $this->request->getVar('payment_method'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'state' => $this->request->getVar('state'),
            'total_price' => $this->request->getVar('total_price'),
            'city' => $this->request->getVar('city'),
            'address' => $this->request->getVar('address'),
            'qty' => $this->request->getVar('qty'),
        ];
        $order->save($data);
        return redirect()->to('thankyou');
    }

    public function edit()
    {
        $user = new ModelsUser();
        $users = $user->find(session()->get('user_id'));
        return view('update-profile', ['users' => $users]);
    }


    public function updates()
    {
        $user = new ModelsUser();
        $id = $this->request->getVar('id');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $phone = $this->request->getVar('phone');
        $address = $this->request->getVar('address');
        $state = $this->request->getVar('state');
        $city = $this->request->getVar('city');
        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'state' => $state,
            'address' => $address,
        ];
        $user->update($id, $data);
        return redirect()->to('users/edit/profile');
    }

    public function delete($id)
    {
        $order = new Order();
        $orders = $order->delete($id);
        return redirect()->to('users/my-order');
    }

    public function deletecart()
    {
        $id = $this->request->getVar('id');
        $carts = new AddToCart();
        $carts->delete($id);
    }

    public function notify()
    {
        $notify = new UserNotify();
        $notifys = $notify->where('u_id', session()->get('user_id'))
            ->join('partners', 'user_notifies.v_id=partners.part_id')
            ->findAll();
        $output = "";
        foreach ($notifys as $not) {
            $output .= "<li><strong>{$not['name']}</strong> {$not['message']}</li>
            <hr>";
        }
        echo $output;
    }

    public function total()
    {
        $notify = new UserNotify();
        $notifys = $notify->where(['u_id' => session()->get('user_id'), 'no_status' => 1])->countAllResults();
        $output = $notifys;
        echo $output;
    }

    public function updatenotify()
    {
        if (session()->get('user_id')) {
            $id = session()->get('user_id');
        }
        $notify = new UserNotify();
        $notifys1 = $notify->where('u_id', $id)->findAll();
        foreach ($notifys1 as $not) {
            $data = [
                'no_status' => 0,
            ];
            $notify->update($not['notify_id'], $data);
        }
    }
}
